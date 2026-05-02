<?php

error_reporting(E_ALL);

// Force PHP to display the errors on the screen
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


$post_data  = $_POST;
$files_data = $_FILES;

$has_file   = !empty($_FILES["image"]["name"]) && !empty($_FILES["image"]["tmp_name"]);
$saved      = false;
$image_new_name = '';

$name = $post_data['name'];
$email = $post_data['email'];

///// validation ....
$errors = [];
$old_data = [];

if(isset($name) and !empty($name)){
    $old_data['name'] = $name;
}else{
    $errors['name'] = "Name is required";
}

if (isset($email) and !empty($email)){
    $old_data['email'] = $email;
    // before start inserting into database , I need to check if email exists or not ....
    try{
        $dsn = "mysql:host=localhost;dbname=iti_arish;port=3306";
        $user = 'arish';
        $password = 'Iti123456789_';
        $db = new PDO($dsn, $user, $password);

        $check_email = "Select count(email) from students where email= :email;";
        $stmt = $db->prepare($check_email);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $found = $stmt->fetch(PDO::FETCH_NUM); # array 00> the first element --> contains the count

        if($found[0] > 0){
            $errors['email'] = "Email already exists";
        }

    }catch (PDOException $e){
        echo $e->getMessage();
    }

}else{
    $errors['email'] = "Email is required";
}


############################################ I need to connect to the database to save the student?

if(count($errors) === 0){

    // upload image if there are no errors.
    if ($has_file) {
        $image          = $_FILES["image"];
        $image_name     = $image["name"];
        $tmp_name       = $image["tmp_name"];
        $extension      = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_new_name = time() . $image_name;
        $saved          = move_uploaded_file($tmp_name, "images/{$image_new_name}");
    }else{
        $image_new_name = null;
    }


    # 1- open connect to insert the data ?
    try{

        //    var_dump($db);
        //    echo "<h1> DB Here </h1>";
        #prepared stmt ---> send you a template to fill the data in
        $query = "insert into `students` (`name`, `email`, `image`)
                values (:name, :email, :image_new_name);";

        $stmt = $db->prepare($query);
        # bind the data to the query ?
        #         //    var_dump($stmt);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':image_new_name', $image_new_name);

        $stmt->execute();
        # when you execute the insert query --> execution is ok , you can return with
        # the inserted id

        $insert_id = $db->lastInsertId();

//    echo "<h1> ID : {$insert_id}</h1>";


    }catch (Exception $e){
        echo "<h1 style='color: red;'> {$e->getMessage()} </h1>";
    }

}else{
    $errors_data = json_encode($errors);
    if(count($old_data)> 0) {
        $form_data = json_encode($old_data);
        header("Location:form.php?errors=$errors_data&form_data=$form_data");
    }else{
        header("Location:form.php?errors=$errors_data");
    }
}










?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Upload Result</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono&display=swap" rel="stylesheet"/>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #F7F6F3;
            min-height: 100vh;
            padding: 2.5rem 1rem;
            color: #2C2C2A;
        }

        body::before {
            content: '';
            position: fixed; inset: 0;
            background:
                    radial-gradient(ellipse 55% 45% at 5% 15%, rgba(127,119,221,0.11) 0%, transparent 70%),
                    radial-gradient(ellipse 45% 55% at 95% 85%, rgba(29,158,117,0.07) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
        }

        .container {
            position: relative; z-index: 1;
            max-width: 680px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        /* ── Page title ── */
        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: #2C2C2A;
            padding-bottom: .5rem;
            border-bottom: 1.5px solid #EDECEA;
        }
        .page-title span {
            font-size: 13px;
            font-weight: 400;
            color: #888780;
            margin-left: 8px;
        }

        /* ── Card ── */
        .card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #EDECEA;
            box-shadow: 0 2px 12px rgba(83,74,183,0.07);
            overflow: hidden;
        }

        .card-header {
            padding: .75rem 1.25rem;
            background: #F7F6F3;
            border-bottom: 1px solid #EDECEA;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-header .dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #534AB7;
            flex-shrink: 0;
        }

        .card-header h2 {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: #5F5E5A;
        }

        .card-body { padding: 1.25rem; }

        /* ── Debug dump ── */
        pre.dump {
            font-family: 'DM Mono', monospace;
            font-size: 13px;
            line-height: 1.7;
            color: #3C3489;
            background: #EEEDFE;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            white-space: pre-wrap;
            word-break: break-all;
            overflow-x: auto;
        }

        /* ── Status banner ── */
        .banner {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 1rem 1.25rem;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 500;
        }

        .banner.success { background: #E1F5EE; color: #0F6E56; border: 1px solid rgba(15,110,86,.2); }
        .banner.error   { background: #FCEBEB; color: #A32D2D; border: 1px solid rgba(163,45,45,.2); }
        .banner.warning { background: #FAEEDA; color: #854F0B; border: 1px solid rgba(133,79,11,.2); }

        .banner-icon {
            width: 36px; height: 36px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .banner.success .banner-icon { background: rgba(15,110,86,.12); }
        .banner.error   .banner-icon { background: rgba(163,45,45,.12); }
        .banner.warning .banner-icon { background: rgba(133,79,11,.12); }

        .banner-icon svg { width: 18px; height: 18px; }

        /* ── File meta grid ── */
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 10px;
            margin-top: 1rem;
        }

        .meta-item {
            background: #F7F6F3;
            border-radius: 10px;
            padding: .75rem 1rem;
        }

        .meta-item .meta-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: #888780;
            margin-bottom: 4px;
        }

        .meta-item .meta-value {
            font-size: 14px;
            font-weight: 500;
            color: #2C2C2A;
            word-break: break-all;
        }

        /* ── Uploaded image preview ── */
        .image-wrap {
            margin-top: 1rem;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #EDECEA;
            background: #F7F6F3;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 160px;
        }

        .image-wrap img {
            max-width: 100%;
            max-height: 400px;
            display: block;
            object-fit: contain;
        }

        /* ── Back link ── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 500;
            color: #534AB7;
            text-decoration: none;
            padding: .5rem 0;
            transition: opacity .15s;
        }
        .back-link:hover { opacity: .7; }
    </style>
</head>
<body>
<div class="container">

    <h1 class="page-title">Upload Result <span>PHP $_POST &amp; $_FILES</span></h1>

    <!-- POST dump -->
    <div class="card">
        <div class="card-header">
            <div class="dot" style="background:#1D9E75;"></div>
            <h2>$_POST data</h2>
        </div>
        <div class="card-body">
            <pre class="dump"><?php var_export($post_data); ?></pre>
        </div>
    </div>

    <!-- FILES dump -->
    <div class="card">
        <div class="card-header">
            <div class="dot" style="background:#534AB7;"></div>
            <h2>$_FILES data</h2>
        </div>
        <div class="card-body">
            <pre class="dump"><?php var_export($files_data); ?></pre>
        </div>
    </div>

    <!-- Upload result -->
    <div class="card">
        <div class="card-header">
            <div class="dot" style="background:#EF9F27;"></div>
            <h2>Upload Status</h2>
        </div>
        <div class="card-body">

            <?php if ($has_file): ?>

                <!-- File received banner -->
                <div class="banner success">
                    <div class="banner-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                        </svg>
                    </div>
                    <div>
                        <div>File information received</div>
                        <div style="font-size:13px;font-weight:400;opacity:.75;margin-top:2px;"><?= htmlspecialchars($image_name) ?></div>
                    </div>
                </div>

                <!-- File metadata -->
                <div class="meta-grid">
                    <div class="meta-item">
                        <div class="meta-label">File name</div>
                        <div class="meta-value"><?= htmlspecialchars($image_name) ?></div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Extension</div>
                        <div class="meta-value"><?= htmlspecialchars(strtoupper($extension)) ?></div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">MIME type</div>
                        <div class="meta-value"><?= htmlspecialchars($files_data['image']['type']) ?></div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Size</div>
                        <div class="meta-value"><?= number_format($files_data['image']['size'] / 1024, 1) ?> KB</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Saved as</div>
                        <div class="meta-value"><?= htmlspecialchars($image_new_name) ?></div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Temp path</div>
                        <div class="meta-value"><?= htmlspecialchars($files_data['image']['tmp_name']) ?></div>
                    </div>
                </div>

                <!-- Save result -->
                <?php if ($saved): ?>
                    <div class="banner success" style="margin-top:1rem;">
                        <div class="banner-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <span>Image saved to <code style="font-family:monospace;background:rgba(15,110,86,.1);padding:2px 6px;border-radius:4px;">images/<?= htmlspecialchars($image_new_name) ?></code></span>
                    </div>
                    <div class="image-wrap">
                        <img src="images/<?= htmlspecialchars($image_new_name) ?>" alt="Uploaded image" />
                    </div>
                <?php else: ?>
                    <div class="banner error" style="margin-top:1rem;">
                        <div class="banner-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                        </div>
                        <span>Image could not be saved. Check that the <code style="font-family:monospace;background:rgba(163,45,45,.1);padding:2px 6px;border-radius:4px;">images/</code> folder exists and is writable.</span>
                    </div>
                <?php endif; ?>

            <?php else: ?>

                <div class="banner warning">
                    <div class="banner-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                            <line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>
                        </svg>
                    </div>
                    <span>No file received. Make sure the form uses <code style="font-family:monospace;background:rgba(133,79,11,.1);padding:2px 6px;border-radius:4px;">enctype="multipart/form-data"</code> and the input name is <code style="font-family:monospace;background:rgba(133,79,11,.1);padding:2px 6px;border-radius:4px;">image</code>.</span>
                </div>

            <?php endif; ?>

        </div>
    </div>

    <a href="javascript:history.back()" class="back-link">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"/>
        </svg>
        Back to form
    </a>

</div>
</body>
</html>