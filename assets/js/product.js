
function previewImage(input) {
    const file = input.files[0]
    const preview = document.getElementById('imagePreview');
    const message = document.getElementById('previewMessage')

    if (file) {
        const allowdTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp']
        if (!allowdTypes.includes(file.type)) {
            message.textContent = "Hình ảnh phải thuộc định dạng (PNG, JPEG, GIF, WEBP)"
            message.classList.remove("hidden");
            input.value = ''
            return
        }
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result
            preview.classList.remove('hidden')
        }
        reader.readAsDataURL(file)
    }
}

