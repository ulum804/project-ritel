    const jabatan = document.getElementById('jabatan');
    const gudang  = document.getElementById('gudangWrapper');

    jabatan.addEventListener('change', function () {
        if (this.value === 'staff_gudang') {
            gudang.style.display = 'block';
        } else {
            gudang.style.display = 'none';
        }
    });