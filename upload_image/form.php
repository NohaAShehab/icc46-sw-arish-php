<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Form</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Serif+Display&display=swap" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --purple-50: #EEEDFE;
            --purple-100: #CECBF6;
            --purple-400: #7F77DD;
            --purple-600: #534AB7;
            --purple-800: #3C3489;
            --purple-900: #26215C;
            --teal-50: #E1F5EE;
            --teal-600: #0F6E56;
            --teal-800: #085041;
            --red-50: #FCEBEB;
            --red-600: #A32D2D;
            --red-800: #791F1F;
            --gray-50: #F7F6F3;
            --gray-100: #EDECEA;
            --gray-200: #D3D1C7;
            --gray-400: #888780;
            --gray-600: #5F5E5A;
            --gray-900: #2C2C2A;
        }

        html, body {
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background: var(--gray-50);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                    radial-gradient(ellipse 60% 50% at 10% 20%, rgba(127,119,221,0.12) 0%, transparent 70%),
                    radial-gradient(ellipse 50% 60% at 90% 80%, rgba(29,158,117,0.08) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .page-wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 500px;
        }

        .form-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 2px 8px rgba(44,44,42,0.06), 0 20px 60px rgba(83,74,183,0.1);
            overflow: hidden;
            animation: fadeUp 0.5s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .form-header {
            background: linear-gradient(135deg, var(--purple-600) 0%, var(--purple-800) 100%);
            padding: 2rem 2rem 1.75rem;
            position: relative;
            overflow: hidden;
        }

        .form-header::after {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }

        .header-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 100px;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 500;
            color: rgba(255,255,255,0.9);
            margin-bottom: 12px;
            letter-spacing: 0.04em;
        }

        .form-header h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 28px;
            font-weight: 400;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .form-header p {
            font-size: 14px;
            color: rgba(255,255,255,0.65);
        }

        .form-body {
            padding: 2rem;
        }

        .field {
            margin-bottom: 1.25rem;
            animation: fadeUp 0.5s ease both;
        }
        .field:nth-child(1) { animation-delay: 0.08s; }
        .field:nth-child(2) { animation-delay: 0.14s; }
        .field:nth-child(3) { animation-delay: 0.20s; }

        .field label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 8px;
        }

        .field label .dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--purple-400);
            flex-shrink: 0;
        }

        .input-wrap { position: relative; }

        .input-wrap svg.input-icon {
            position: absolute;
            left: 14px; top: 50%; transform: translateY(-50%);
            width: 16px; height: 16px;
            stroke: var(--gray-400);
            pointer-events: none;
            transition: stroke 0.15s;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 11px 14px 11px 42px;
            font-size: 15px;
            font-family: 'DM Sans', sans-serif;
            color: var(--gray-900);
            background: var(--gray-50);
            border: 1.5px solid var(--gray-200);
            border-radius: 12px;
            outline: none;
            transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: var(--purple-400);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(127,119,221,0.12);
        }

        input[type="text"]:focus ~ svg.input-icon,
        input[type="number"]:focus ~ svg.input-icon { stroke: var(--purple-400); }

        input::placeholder { color: var(--gray-400); }

        /* Upload zone */
        .upload-zone {
            position: relative;
            border: 2px dashed var(--gray-200);
            border-radius: 16px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            cursor: pointer;
            background: var(--gray-50);
            transition: border-color 0.2s, background 0.2s;
            overflow: hidden;
        }

        .upload-zone:hover {
            border-color: var(--purple-400);
            background: var(--purple-50);
        }

        .upload-zone.active {
            border-color: var(--purple-600);
            background: var(--purple-50);
        }

        #file-input { display: none; }

        .avatar-circle {
            width: 64px; height: 64px;
            border-radius: 50%;
            background: var(--purple-50);
            border: 2px solid var(--purple-100);
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: border-color 0.2s;
        }

        .avatar-circle img {
            width: 100%; height: 100%;
            object-fit: cover;
            display: none;
        }

        .avatar-circle svg { width: 28px; height: 28px; }

        .upload-text strong {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--purple-600);
            margin-bottom: 2px;
        }

        .upload-text span {
            font-size: 12px;
            color: var(--gray-400);
        }

        #file-name-display {
            font-size: 12px;
            color: var(--purple-600);
            font-weight: 500;
            margin-top: 4px;
            display: none;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: var(--gray-100);
            margin: 1.75rem 0 1.5rem;
        }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: 13px;
            font-size: 15px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, var(--purple-600) 0%, var(--purple-800) 100%);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: opacity 0.15s, transform 0.1s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(83,74,183,0.3);
            letter-spacing: 0.02em;
        }

        .btn-submit:hover { opacity: 0.92; box-shadow: 0 6px 24px rgba(83,74,183,0.35); }
        .btn-submit:active { transform: scale(0.98); }

        /* Toast message */
        .toast {
            display: none;
            margin-top: 1rem;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 500;
            text-align: center;
            animation: fadeUp 0.3s ease both;
        }

        .toast.success {
            background: var(--teal-50);
            border: 1px solid rgba(15,110,86,0.25);
            color: var(--teal-600);
        }

        .toast.error {
            background: var(--red-50);
            border: 1px solid rgba(163,45,45,0.25);
            color: var(--red-600);
        }

        /* Footer */
        .form-footer {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 12px;
            color: var(--gray-400);
        }
    </style>
</head>
<body>
<div class="page-wrap">
    <div class="form-card">

        <div class="form-header">
            <div class="header-badge">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none">
                    <circle cx="5" cy="5" r="4" stroke="rgba(255,255,255,0.8)" stroke-width="1.5"/>
                    <circle cx="5" cy="5" r="1.5" fill="rgba(255,255,255,0.8)"/>
                </svg>
                New profile
            </div>
            <h1>Profile Information</h1>
            <p>Fill in the details below to create your entry.</p>
        </div>

        <form  method="post"  action="saveimage.php"
               enctype="multipart/form-data">
        <div class="form-body">
            <div class="field">
                <label><span class="dot"></span>ID number</label>
                <div class="input-wrap">
                    <input type="number" id="id-field"
                           name ='id'
                           placeholder="e.g. 10042" />
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="16" rx="2"/>
                        <line x1="7" y1="9" x2="17" y2="9"/>
                        <line x1="7" y1="13" x2="13" y2="13"/>
                    </svg>
                </div>
            </div>

            <div class="field">
                <label><span class="dot"></span>Full name</label>
                <div class="input-wrap">
                    <input type="text" name="name"
                           id="name-field" placeholder="e.g. Noha Hassan" />
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                    </svg>
                </div>
            </div>

            <div class="field">
                <label><span class="dot"></span>Profile image</label>
                <div class="upload-zone" id="upload-zone" onclick="document.getElementById('file-input').click()">
                    <div class="avatar-circle" id="avatar-circle">
                        <img id="img-preview" src="" alt="Preview" />
                        <svg viewBox="0 0 24 24" fill="none" stroke="#7F77DD" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" id="avatar-icon">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                        </svg>
                    </div>
                    <div class="upload-text">
                        <strong>Click to upload image</strong>
                        <span>PNG, JPG or WEBP — max 5 MB</span>
                        <div id="file-name-display"></div>
                    </div>
                </div>
                <input type="file" name="image" id="file-input" accept="image/*" />
            </div>

            <div class="divider"></div>

            <input  type="submit" class="btn-submit" value="Save profile" >
            <div class="toast" id="toast"></div>

            <p class="form-footer">All fields are required to submit.</p>
        </div>
        </form>
    </div>
</div>

<script>
    const fileInput = document.getElementById('file-input');
    const imgPreview = document.getElementById('img-preview');
    const avatarIcon = document.getElementById('avatar-icon');
    const avatarCircle = document.getElementById('avatar-circle');
    const uploadZone = document.getElementById('upload-zone');
    const fileNameDisplay = document.getElementById('file-name-display');

    fileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            imgPreview.src = e.target.result;
            imgPreview.style.display = 'block';
            avatarIcon.style.display = 'none';
            avatarCircle.style.borderColor = '#534AB7';
            fileNameDisplay.textContent = file.name;
            fileNameDisplay.style.display = 'block';
            uploadZone.classList.add('active');
        };
        reader.readAsDataURL(file);
    });

    uploadZone.addEventListener('dragover', e => {
        e.preventDefault();
        uploadZone.classList.add('active');
    });

    uploadZone.addEventListener('dragleave', () => {
        if (!fileInput.files.length) uploadZone.classList.remove('active');
    });

    uploadZone.addEventListener('drop', e => {
        e.preventDefault();
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            fileInput.files = e.dataTransfer.files;
            fileInput.dispatchEvent(new Event('change'));
        }
    });

    function showToast(msg, type) {
        const toast = document.getElementById('toast');
        toast.textContent = msg;
        toast.className = 'toast ' + type;
        toast.style.display = 'block';
        setTimeout(() => { toast.style.display = 'none'; }, 4000);
    }

    function handleSubmit() {
        const id = document.getElementById('id-field').value.trim();
        const name = document.getElementById('name-field').value.trim();
        const hasImage = imgPreview.style.display === 'block';

        if (!id || !name || !hasImage) {
            showToast('Please fill in all fields and upload an image.', 'error');
            return;
        }

        showToast(`Profile for "${name}" (ID: ${id}) saved successfully!`, 'success');
    }
</script>
</body>
</html>