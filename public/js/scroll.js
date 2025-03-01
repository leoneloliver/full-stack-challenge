// sticky sidebar when scrolling
document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.getElementById('filter-sidebar');
  const parentContainer = document.getElementById('job-listings-container');

  if (sidebar && parentContainer) {
    let sidebarWidth = sidebar.offsetWidth;
    const sidebarTop = sidebar.offsetTop;

    function handleScroll() {
      if (window.innerWidth >= 768) {
        const parentWidth = parentContainer.offsetWidth;
        sidebarWidth = parentWidth * 0.25 - 18;

        if (window.pageYOffset > sidebarTop) {
          sidebar.classList.add('sticky-sidebar');
          sidebar.style.width = sidebarWidth + 'px';
        } else {
          sidebar.classList.remove('sticky-sidebar');
          sidebar.style.width = '';
        }
      } else {
        sidebar.classList.remove('sticky-sidebar');
        sidebar.style.width = '';
      }
    }

    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleScroll);

    handleScroll();
  }
});
