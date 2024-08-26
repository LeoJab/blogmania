document.addEventListener('DOMContentLoaded', () => {
    console.log('JS Chargé !');

    // MENU HEADER BLOG
    const btnHeaderBlog = document.querySelector('#btnHeaderBlog');
    const menuHeaderBlog = document.querySelector('#menuHeaderBlog');
    console.log(btnHeaderBlog, menuHeaderBlog);

    if(btnHeaderBlog) {
        btnHeaderBlog.addEventListener('mouseover', () => {
            console.log('survole');

            if(menuHeaderBlog.classList == 'none') {
                menuHeaderBlog.classList.toggle('none');
            } else {
                menuHeaderBlog.classList.toggle('none');
            }
        });
    };

    if(menuHeaderBlog) {
        menuHeaderBlog.addEventListener('mouseout', () => {
            if(menuHeaderBlog.classList == 'none') {
                menuHeaderBlog.classList.toggle('none');
            } else {
                menuHeaderBlog.classList.toggle('none');
            }
        });
    };

    // SECTION BTN
    const btnSvgSectionBlog = document.querySelectorAll('.svg_blog');
    const btnSvgSectionCategorie = document.querySelector('.svg_categorie');
    const sectionBlogs = document.querySelectorAll('.section_blogs');
    const sectionCategories = document.querySelector('.section_categories');
    console.log(btnSvgSectionBlog, sectionBlogs, sectionCategories);

    // SVG [0] SECTION BLOG
    if(btnSvgSectionBlog[0]) {
        btnSvgSectionBlog[0].addEventListener('click', () => {
            console.log('SVG Click');
            if(btnSvgSectionBlog.classList != 'active') {
                btnSvgSectionBlog[0].classList.toggle('active');
            } else {
                btnSvgSectionBlog[0].classList.toggle('active');
            };

            if(sectionBlogs[0].classList != 'active') {
                sectionBlogs[0].classList.toggle('active');
            } else {
                sectionBlogs[0].classList.toggle('active');
            };
        });
    };

    // SVG [1] SECTION BLOG
    if(btnSvgSectionBlog[1]) {
        btnSvgSectionBlog[1].addEventListener('click', () => {
            console.log('SVG Click');
            if(btnSvgSectionBlog.classList != 'active') {
                btnSvgSectionBlog[1].classList.toggle('active');
            } else {
                btnSvgSectionBlog[1].classList.toggle('active');
            };

            if(sectionBlogs[1].classList != 'active') {
                sectionBlogs[1].classList.toggle('active');
            } else {
                sectionBlogs[1].classList.toggle('active');
            };
        });
    };

    // SVG SECTION CATEGORIE
    if(btnSvgSectionCategorie) {
        btnSvgSectionCategorie.addEventListener('click', () => {
            console.log('SVG Click');
            if(btnSvgSectionCategorie.classList != 'active') {
                btnSvgSectionCategorie.classList.toggle('active');
            } else {
                btnSvgSectionCategorie.classList.toggle('active');
            };

            if(sectionCategories.classList != 'active') {
                sectionCategories.classList.toggle('active');
            } else {
                sectionCategories.classList.toggle('active');
            };
        });
    };

    //AFFICHAGE DE L'IMAGE APRES L'UPLOAD BLOG ET UTILISATEUR
    const input = document.querySelector('#image');
    const image = document.querySelector('#preview');
    const regexImg = /.(jpe?g|png|webp)$/i; 
    console.log(input, image);

    if(input) {
        input.addEventListener('change', (event) => {
            console.log('Change !');
            const file = event.target.files[0];
            const reader = new FileReader();
            console.log(file);

            if(!regexImg.test(file.type)) {
                document.querySelector('#errImg').innerHTML = 'Votre image doit etre en format JPEG, PNG ou WEBP';

                image.src = '';

                return false;
            } else {
                reader.onload = function(e) {
                    image.src = e.target.result;
                };
                document.querySelector('#errImg').innerHTML = '';
    
                reader.readAsDataURL(file);
            }
        });
    };
})