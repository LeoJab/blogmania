document.addEventListener('DOMContentLoaded', () => {
    console.log('JS Chargé !');

    const btnHeaderBlog = document.querySelector('#btnHeaderBlog');
    const menuHeaderBlog = document.querySelector('#menuHeaderBlog');
    console.log(btnHeaderBlog);

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
})