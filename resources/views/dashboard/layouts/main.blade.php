<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" data-assets-path="../../../assets" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=Ddevice-width, initial-scale=1.0" />
    <title>Perpsutakaan digital</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}" sizes="16x16" />
    <!-- Remix Icon font css -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}" />
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}" />
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}" />
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}" />
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}" />
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}" />
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}" />
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}" />
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}" />
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custon.css') }}" />
    <!-- Loading -->
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}">

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>


    <style>
        .dt-length .dt-input {

            text-align: center;
        }

        .cutom-tr-table td,
        .cutom-tr-table th {
            text-align: start !important;
        }

        th.custom-text-sm {
            font-size: 1px !important;
            color: green !important
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin-right: 5px;
            vertical-align: middle;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loading-spinner {
            display: none;
            margin-left: 5px;
            /* Tambahan untuk memberi jarak dengan teks "Upload" */
        }

        .loading-spinner.active {
            display: inline-block;
        }

        .input-icon {
            position: relative;
            display: inline-block;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .form-control {
            padding-left: 40px;
        }

        .custom-radius {
            border-radius: 0 10px 0 0;
            color: white
        }

        .card-img-top {
            height: 300px;
            width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    @include('dashboard.layouts.sidebar')
    <!-- End Sidebar -->



    <main class="dashboard-main position-relative">

        <!-- Header -->
        @include('dashboard.layouts.header')

        <!-- Alert -->

        @include('dashboard/components/alert/alert')


        <!-- End Header -->
        <div class="dashboard-main-body">

            <!-- Content -->
            @yield('contents')
            <!-- End Content -->

        </div>

        <!-- Footer -->
        @yield('dashboard.layouts.footer')
        <!-- End Footer -->
    </main>

    <!-- jQuery library js -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Popup js -->
    <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
    <!-- Main js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/js/homeOneChart.js') }}"></script>
    <script src="{{ asset('assets/js/cutomDataTable.js') }}"></script>

    <script>
        window.onload = function() {
            var textElements = document.querySelectorAll(".long-text");

            textElements.forEach(function(textElement) {
                var text = textElement.innerHTML;

                var words = text.split(" "); // Pisahkan teks berdasarkan spasi
                if (words.length > 3) {
                    // Gabungkan dua kata pertama dan tambahkan '...'
                    textElement.innerHTML = words.slice(0, 3).join(" ") + "...";
                }
            });
        }
    </script>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            // Sembunyikan rack details
            document.getElementById('rackDetails').style.display = 'none';

            // Tampilkan form edit
            document.getElementById('editForm').style.display = 'block';

            // Tampilkan tombol Cancel
            document.getElementById('cancelButton').style.display = 'inline-flex';
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            // Tampilkan rack details
            document.getElementById('rackDetails').style.display = 'block';

            // Sembunyikan form edit
            document.getElementById('editForm').style.display = 'none';

            // Sembunyikan tombol Cancel
            document.getElementById('cancelButton').style.display = 'none';
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(650);
                    $("#actionButtons").removeClass("d-none");
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function() {
            readURL(this);
        });

        // Fungsi untuk tombol Cancel
        $("#cancelButton").click(function() {
            // Hapus gambar yang di-upload
            $("#imageUpload").val('');
            $("#imagePreview");
            // Sembunyikan tombol Save dan Cancel
            $("#actionButtons").addClass("d-none");
            location.reload();
        });

        // Fungsi untuk tombol Save
        // Fungsi untuk tombol Save
        $("#saveButton").click(function(e) {
            e.preventDefault(); // Mencegah form submit biasa
            var formData = new FormData($('#photoForm')[0]);

            $.ajax({
                url: $('#photoForm').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#actionButtons").addClass("d-none");
                    {{--  alert("Gambar berhasil disimpan!");  --}}
                    $('#imagePreview').css("background-image", "url(" + response.newImageUrl + ")");
                    location.reload();
                },
                error: function(response) {
                    alert("Terjadi kesalahan saat menyimpan gambar.");
                }
            });
            return false;
        });
    </script>

    <script>
        let form = document.querySelector('#some-form');
        let loader = document.querySelector('#loader')

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // using non css framework method with Style
            loader.style.display = 'block';

            // using a css framework such as TailwindCSS
            loader.classList.remove('hidden');

            // pretend the form has been sumitted and returned
            setTimeout(() => loader.style.display = 'none', 1000);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#cancel_button').click(function() {
                // Mengosongkan semua input di form
                $('#myForm')[0].reset();
            });
        });

        // Generaate Password
        $(document).ready(function() {
            // Fungsi untuk menghasilkan password acak
            $('#generatePassword').click(function() {
                function generateRandomPassword(length) {
                    const characters =
                        'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+[]';
                    let password = '';
                    for (let i = 0; i < length; i++) {
                        password += characters.charAt(Math.floor(Math.random() * characters.length));
                    }
                    return password;
                }
                const newPassword = generateRandomPassword(12);
                $('#password').val(newPassword);
            });

            // Fungsi untuk menyalin password ke clipboard saat tombol Copy diklik
            $('.input-group-text').click(function() {
                const password = $('#password').val();
                if (password) {
                    copyToClipboard(password);
                }
            });

            // Fungsi untuk menyalin teks ke clipboard
            function copyToClipboard(text) {
                const tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(text).select();
                document.execCommand('copy');
                tempInput.remove();

                // Mengubah ikon dan teks Copy menjadi centang
                const copyButton = $('.input-group-text');
                copyButton.html('<iconify-icon icon="lucide:check"></iconify-icon> Copied');
                copyButton.addClass('text-success');

                // Mengembalikan ikon dan teks ke "Copy" setelah beberapa detik
                setTimeout(function() {
                    copyButton.html('<iconify-icon icon="lucide:copy"></iconify-icon> Copy');
                    copyButton.removeClass('text-success');
                }, 2000); // Kembali ke "Copy" setelah 2 detik
            }

            // Fungsi untuk menampilkan atau menyembunyikan password
            $('#togglePassword').click(function() {
                const passwordField = $('#password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);

                // Mengubah teks "Show Password" atau "Hide Password"
                $(this).text(type === 'password' ? 'Show Password' : 'Hide Password');
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-plus', function() {
                let counterElement = $(this).siblings('.counter');
                let currentCount = parseInt(counterElement.text());
                currentCount++;
                counterElement.text(currentCount);
                $(this).siblings('.counter_value').val(currentCount);
            });

            $(document).on('click', '.btn-minus', function() {
                let counterElement = $(this).siblings('.counter');
                let currentCount = parseInt(counterElement.text());
                if (currentCount > 1) {
                    currentCount--;
                    counterElement.text(currentCount);
                    $(this).siblings('.counter_value').val(currentCount);
                }
            });
        });


        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();

                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('books.search') }}",
                        method: 'GET',
                        data: {
                            search: query
                        },
                        success: function(data) {
                            $('#bookResults').html(data);
                        }
                    });
                } else {
                    $('#bookResults').html('');
                }
            });

            $(document).on('click', '.book-item', function() {
                if ($(this).hasClass('stock-out')) {
                    alert('Buku ini telah habis dan tidak dapat dipinjam.');
                    return; // hentikan eksekusi
                }

                let isbn = $(this).data('isbn');
                let judul = $(this).data('judul');
                let rack = $(this).data('rack');
                let subRack = $(this).data('sub-rack');
                let idBooks = $(this).data('id-books')
                let stock = $(this).data('stock');

                console.log('ISBN: ' + isbn);
                console.log('Judul: ' + judul);
                console.log('Rack: ' + rack);
                console.log('Sub-Rack: ' + subRack);
                console.log('Id Bookks:' + idBooks);

                if (isbn && judul && rack && subRack) {
                    let newBookInfo = $('.book-info-template').clone().removeClass('book-info-template')
                        .show();

                    // Isi nilai di elemen yang baru dibuat
                    newBookInfo.find('.isbn_pinjam').text(isbn);
                    newBookInfo.find('.judul_buku').text(judul);
                    newBookInfo.find('.rack_buku').text(rack + ' & ' + subRack);
                    newBookInfo.find('.id_books').text(idBooks)

                    newBookInfo.find('.id_books').attr('name', 'id_books[]').val(idBooks).attr('type',
                        'hidden');
                    newBookInfo.find('.counter_value').attr('name', 'counter[]').val(1);

                    // Tambahkan elemen baru ke dalam container
                    $('.books-container').parent().append(newBookInfo);
                } else {
                    console.log('Data incomplete, cannot add book');
                }
            });

        });
    </script>


    <script>
        $(".remove-button").on("click", function() {
            $(this).closest(".alert").addClass("d-none");
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#code_category').on('input', function() {
                var codecategory = $(this).val();
                console.log("Input value: " + codecategory);

                if (codecategory.length > 0) {
                    $.ajax({
                        url: '/get-category/' + codecategory,
                        method: 'GET',
                        success: function(response) {
                            console.log("Response:", response); // Log the response
                            if (response.name_category) {
                                $('#name_category').val(response.name_category);
                            } else {
                                $('#name_category').val('Kategori tidak ditemukan');
                            }
                        },
                        error: function(xhr) {
                            console.error("Error:", xhr.responseText); // Log errors if any
                            $('#name_category').val('Error retrieving data');
                        }
                    });
                } else {
                    $('#name_category').val('');
                }
            });
        });

        $(document).ready(function() {
            // Set up CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#rak').change(function() {
                var rakId = $(this).val();
                if (rakId) {
                    $.ajax({
                        url: "{{ route('get.subs') }}", // Pastikan route ini benar
                        type: "POST",
                        data: {
                            id_rack: rakId // Pastikan parameter ini sesuai dengan yang di controller
                        },
                        success: function(data) {
                            console.log(data); // Debugging response dari server
                            $('#subs').empty();
                            $('#subs').empty().append(
                                '<option value="" selected>Pilih Sub Rak</option>');
                            $.each(data, function(key, value) {
                                $('#subs').append('<option value="' + value.code_sub +
                                    '">' +
                                    value.code_sub + '</option>');
                            });
                        },
                        error: function(xhr) {
                            $('#subs').html('<option>Gagal memuat Sub Rak</option>');
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#subs').empty();
                    $('#subs').empty().append('<option>Pilih Sub Rak</option>');
                }
            });
            var bookItems = $('.book-item');
            var limit = 9;

            bookItems.slice(limit).hide();
        });
    </script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            var table = $('#books').DataTable({
                language: {
                    lengthMenu: "_MENU_",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada data yang tersedia",
                    infoFiltered: "(difilter dari _MAX_ total entri)",
                    search: "Search by title or ISBN:",
                },
                "lengthMenu": [10, 25, 50, 100],
                "pageLength": 10,
                "searching": true
            });
        });
        $('#categoryDropdown').on('change', function() {
            var category = $(this).val();
            table.column(2).search(category).draw();
        });
    </script>




</body>

</html>
