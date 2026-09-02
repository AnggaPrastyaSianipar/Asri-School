document.addEventListener('DOMContentLoaded', function() {
    var menuItems = document.getElementById('menu-items');
    var toggleButton = document.getElementById('toggle-menu');
    var toggleIcon = document.getElementById('toggle-icon');
    
    toggleButton.addEventListener('click', function() {
      if (menuItems.classList.contains('show')) {
        menuItems.classList.remove('show');
        toggleIcon.src = 'gambar/menu.png'; // Ubah src menjadi ikon "tampilkan"
       
      } else {
        menuItems.classList.add('show');
        toggleIcon.src = 'gambar/tutupmenu.png'; // Ubah src menjadi ikon "sembunyikan"
        
      }
    });
  });


  


  document.addEventListener("DOMContentLoaded", function() {
    // Ambil semua elemen dengan class 'dropdown'
    const dropdowns = document.querySelectorAll('.dropdown');

    // Iterasi setiap dropdown dan tambahkan event listener untuk setiap dropdown
    dropdowns.forEach(dropdown => {
      // Tambahkan event listener untuk mouseover untuk menampilkan dropdown saat mouse di atasnya
      dropdown.addEventListener('mouseover', function() {
        this.querySelector('ul').style.display = 'block';
      });

      // Tambahkan event listener untuk mouseout untuk menyembunyikan dropdown saat mouse meninggalkan area dropdown
      dropdown.addEventListener('mouseout', function() {
        this.querySelector('ul').style.display = 'none';
      });
    });
  });



  
  