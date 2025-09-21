<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Document</title>
  <link rel="stylesheet" href="styles/Upload-html.css">
</head>

<body>
  
  <form method="POST" action="Upload-php.php" enctype="multipart/form-data">
    <label for="file-input" class="file-upload-label">Select File(s)</label>
    <input type="file" id="file-input" name="profileImage[]" multiple>
    <span class="file-name-display">No file selected</span>
    <input type="submit" value="Upload">
  </form>
<script>
    
    const fileInput = document.getElementById('file-input');
    const fileNameDisplay = document.querySelector('.file-name-display');

    fileInput.addEventListener('change', (event) => {
        const files = event.target.files;
        if (files.length > 0) {
            let fileNames = Array.from(files).map(file => file.name).join(', ');
            fileNameDisplay.textContent = fileNames;
        } else {
            fileNameDisplay.textContent = 'No file selected';
        }
    });
</script>
</body>

</html>