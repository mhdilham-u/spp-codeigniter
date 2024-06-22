function getFoto() {
  const foto = document.querySelector('#foto');
  const fotoLabel = document.querySelector('.custom-file-label');
  
  fotoLabel.textContent = foto.files[0].name;
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$(function() {
    var path = window.location.href; // Mengambil data URL pada Address bar
    $('ul li .nav-link').each(function() {
        // Jika URL pada menu ini sama persis dengan path...
        if (this.href === path) {
            // Tambahkan kelas "active" pada menu ini
            $(this).addClass('active');
        }
    });
});

const swal = $('.swal').data('swal');
if(swal) {
    Swal.fire({
        title: 'Data Berhasil',
        text: swal,
        icon: 'success'
    })
}

const batal = $('.batal').data('batal');
if(batal) {
    Swal.fire({
        title: 'Pembatalan Berhasil',
        text: batal,
        icon: 'success'
    })
}

const spp = $('.spp').data('spp');
if(spp) {
    Swal.fire({
        title: 'Pembayaran Berhasil',
        text: spp,
        icon: 'success'
    })
}

$(document).on('click', '.btn-hapus', function(e){
    e.preventDefault();
    const hrefs = $(this).attr('href');
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data yang telah dihapus tidak bisa dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: 'rgb(71, 12, 211)',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = hrefs;
    }
  })
});

$(document).on('click', '.btn-batal', function(e){
    e.preventDefault();
    const hrefs = $(this).attr('href');
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Untuk membatalkan pembayaran ini?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: 'rgb(71, 12, 211)',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yakin'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = hrefs;
    }
  })
});