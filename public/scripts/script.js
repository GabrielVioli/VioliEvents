// public/js/scripts.js

document.addEventListener('DOMContentLoaded', function() {

    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const uploadPlaceholder = document.getElementById('upload-placeholder');

    if(imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];

            if(file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    if(imagePreview) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    }

                    if(uploadPlaceholder) {
                        uploadPlaceholder.classList.add('hidden');
                    }

                    let existingPreview = document.getElementById('temp-preview');
                    if(!existingPreview) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.id = 'temp-preview';
                        img.className = 'h-32 w-full object-cover rounded-lg';

                        const label = imageInput.closest('label');
                        const originalContent = label.querySelector('div');
                        if(originalContent) originalContent.classList.add('hidden');

                        label.appendChild(img);
                    } else {
                        existingPreview.src = e.target.result;
                    }
                }

                reader.readAsDataURL(file);
            }
        });
    }
});
