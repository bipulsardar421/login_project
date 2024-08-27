<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Upload Container</title>
    <style>
        /* Your existing CSS */

        .upload-container {
            width: 400px;
            background-color: #f4f7fc;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: auto;
        }

        .upload-box {
            border: 2px dashed #b5cbe0;
            border-radius: 10px;
            padding: 40px;
            margin-bottom: 20px;
            background-color: #fff;
            position: relative;
        }

        .upload-box img {
            width: 50px;
            margin-bottom: 20px;
        }

        .upload-box p {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #7a9cb3;
        }

        .upload-box a {
            color: #3366ff;
            text-decoration: none;
        }

        .upload-box a:hover {
            text-decoration: underline;
        }

        .upload-box img.preview {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            margin-top: 20px;
            border-radius: 10px;
        }

        .upload-box.drop-active {
            border-color: #3366ff;
            background-color: #e6f0ff;
        }

        .upload-box.drop-active p {
            color: #3366ff;
        }

        .remove-btn {
            margin-top: 20px;
            background-color: #ff5f5f;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .remove-btn:hover {
            background-color: #ff3b3b;
        }
    </style>
</head>

<body style="background: radial-gradient(circle, rgba(255, 200, 224, 1) 0%, rgba(147, 171, 199, 1) 100%);">

    <div class="upload-container">
        <div class="upload-box" id="uploadBox">
            <div class="upload-icon">
                <img src="assets/icons/upload.svg" alt="Upload Icon">
            </div>
            <p>Drop your image here, or <a href="#" id="browseBtn">browse</a></p>
            <p>Supports: JPG, JPEG and PNG</p>
            <input type="file" id="fileInput" style="display: none;" accept="image/*">
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const uploadBox = document.getElementById('uploadBox');
            const fileInput = document.getElementById('fileInput');
            const browseBtn = document.getElementById('browseBtn');

            // Show file dialog on browse button click
            browseBtn.addEventListener('click', (event) => {
                event.preventDefault();
                fileInput.click();
            });

            // Handle file selection
            fileInput.addEventListener('change', handleFileSelect);

            // Handle drag and drop
            uploadBox.addEventListener('dragover', (event) => {
                event.preventDefault();
                uploadBox.classList.add('drop-active');
            });

            uploadBox.addEventListener('dragleave', () => {
                uploadBox.classList.remove('drop-active');
            });

            uploadBox.addEventListener('drop', (event) => {
                event.preventDefault();
                uploadBox.classList.remove('drop-active');
                if (event.dataTransfer.files.length) {
                    handleFileSelect({ target: { files: event.dataTransfer.files } });
                }
            });

            function handleFileSelect(event) {
                const file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const previewImage = document.createElement('img');
                        previewImage.src = e.target.result;
                        previewImage.classList.add('preview');

                        // Create a remove button
                        const removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove';
                        removeButton.classList.add('remove-btn');

                        // Handle remove button click
                        removeButton.addEventListener('click', () => {
                            resetUploadBox();
                        });

                        // Clear previous content and show the image and remove button
                        uploadBox.innerHTML = '';
                        uploadBox.appendChild(previewImage);
                        uploadBox.appendChild(removeButton);
                    };
                    reader.readAsDataURL(file);
                }
            }

            function resetUploadBox() {
                // Reset the upload box to its original state
                uploadBox.innerHTML = `
                    <div class="upload-icon">
                        <img src="assets/icons/upload.svg" alt="Upload Icon">
                    </div>
                    <p>Drop your image here, or <a href="#" id="browseBtn">browse</a></p>
                    <p>Supports: JPG, JPEG and PNG</p>
                    <input type="file" id="fileInput" style="display: none;" accept="image/*">
                `;
                // Reattach the event listeners to the new file input element
                document.getElementById('browseBtn').addEventListener('click', (event) => {
                    event.preventDefault();
                    document.getElementById('fileInput').click();
                });
                document.getElementById('fileInput').addEventListener('change', handleFileSelect);
            }
        });
    </script>

</body>

</html>