document.addEventListener('DOMContentLoaded', () => {
    console.log('JS Chargé !');

    // MENU HEADER BLOG
    const btnHeaderBlog = document.querySelector('#btnHeaderBlog');
    const menuHeaderBlog = document.querySelector('#menuHeaderBlog');
    console.log(btnHeaderBlog, menuHeaderBlog);

    btnHeaderBlog.addEventListener('mouseover', () => {
        console.log('survole');

        if(menuHeaderBlog.classList == 'none') {
            menuHeaderBlog.classList.toggle('none');
        } else {
            menuHeaderBlog.classList.toggle('none');
        }
    });

    menuHeaderBlog.addEventListener('mouseout', () => {
        if(menuHeaderBlog.classList == 'none') {
            menuHeaderBlog.classList.toggle('none');
        } else {
            menuHeaderBlog.classList.toggle('none');
        }
    });

    // SECTION BTN
    const btnSvgSectionBlog = document.querySelectorAll('.svg_blog');
    const btnSvgSectionCategorie = document.querySelector('.svg_categorie');
    const sectionBlogs = document.querySelectorAll('.section_blogs');
    const sectionCategories = document.querySelector('.section_categories');
    console.log(btnSvgSectionBlog, sectionBlogs, sectionCategories);

    // SVG [0] SECTION BLOG
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

    // SVG [1] SECTION BLOG
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

    // SVG SECTION CATEGORIE
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
})