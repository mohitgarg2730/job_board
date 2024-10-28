<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@if (session('e'))





<script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('e') }}",
            icon: 'error',
            confirmButtonText: 'close!'
        });

</script>

<style>
    .nice-select.swal2-select {
        display: none;
    }
    </style>

@endif
@if (session('s'))

<script>
    Swal.fire({
        title: 'Success!',
        text: "{{ session('s') }}",
        icon: 'success',
        confirmButtonText: 'close!'
    });

</script>


<style>
    .nice-select.swal2-select {
        display: none;
    }
    </style>



@endif




@if (session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif
