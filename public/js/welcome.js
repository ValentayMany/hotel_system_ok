document.getElementById('submit-button').addEventListener('click', function (event) {
  event.preventDefault(); // ป้องกันการ submit form (ถ้าอยู่ใน form)

  alert('ທ່ານໄດ້ລົງທະບຽນແລ້ວຫຼືບໍ່!'); // แสดงข้อความแจ้งเตือน
});

// ฟังก์ชั่นในการเปิดและปิดเมนูเมื่อคลิกปุ่ม hamburger menu
document.querySelector('.menu-toggle').addEventListener('click', () => {
  const navLinks = document.querySelector('.nav-links');
  navLinks.classList.toggle('show');
});


function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
};


document.addEventListener('DOMContentLoaded', function () {
  const navbar = document.querySelector('.navbar-container');
  let lastScrollTop = 0;

  window.addEventListener('scroll', function () {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      if (scrollTop > lastScrollTop) {
          // เลื่อนลง
          navbar.classList.add('hide-nav');
      } else {
          // เลื่อนขึ้น
          navbar.classList.remove('hide-nav');
      }
      lastScrollTop = scrollTop;
  });
})


function toggleMenu() {
  const navLinks = document.getElementById('navLinks');
  navLinks.classList.toggle('active');
}

window.addEventListener('scroll', function () {
  const backToTopButton = document.querySelector('.back-to-top');
  if (window.scrollY > 300) {
    backToTopButton.style.display = 'block';
  } else {
    backToTopButton.style.display = 'none';
  }
});

/* function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}
 */


