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
    const btnSvgSection = document.querySelectorAll('.svg');
    const sectionBlogs = document.querySelectorAll('.section_blogs');
    console.log(btnSvgSection, sectionBlogs);

    // SVG [0]
    btnSvgSection[0].addEventListener('click', () => {
        console.log('SVG Click');
        if(btnSvgSection.classList != 'active') {
            btnSvgSection[0].classList.toggle('active');
        } else {
            btnSvgSection[0].classList.toggle('active');
        };

        if(sectionBlogs[0].classList != 'active') {
            sectionBlogs[0].classList.toggle('active');
        } else {
            sectionBlogs[0].classList.toggle('active');
        };
    });

    // SVG [1]
    btnSvgSection[1].addEventListener('click', () => {
        console.log('SVG Click');
        if(btnSvgSection.classList != 'active') {
            btnSvgSection[1].classList.toggle('active');
        } else {
            btnSvgSection[1].classList.toggle('active');
        };

        if(sectionBlogs[1].classList != 'active') {
            sectionBlogs[1].classList.toggle('active');
        } else {
            sectionBlogs[1].classList.toggle('active');
        };
    });

    // SVG [2]
    btnSvgSection[2].addEventListener('click', () => {
        console.log('SVG Click');
        if(btnSvgSection.classList != 'active') {
            btnSvgSection[2].classList.toggle('active');
        } else {
            btnSvgSection[2].classList.toggle('active');
        };

        if(sectionBlogs[2].classList != 'active') {
            sectionBlogs[2].classList.toggle('active');
        } else {
            sectionBlogs[2].classList.toggle('active');
        };
    });
})