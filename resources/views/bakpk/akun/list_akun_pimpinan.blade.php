<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPMA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
    <style>
        /* CSS for hover effect */
        table tbody tr:hover {
            background-color: #f0f0f0;
            /* Ganti warna latar belakang saat hover di sini */
            transition: background-color 0.3s;
            /* Animasi perubahan warna latar belakang */
        }

        /* Sidebar Menu Styles */
        #sidebar {
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            position: fixed;
            height: 100%;
            transition: width 0.2s;
        }

        #sidebar .nav-link {
            color: #333;
            text-align: center;
            padding: 10px 0;
            transition: background-color 0.2s, color 0.2s;
        }

        #sidebar .nav-link:hover {
            background-color: #14389b;
            color: #fff;
            text-decoration: none;
        }

        /* Active Link Styles */
        #sidebar .nav-link.active {
            color: #14389b;
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none !important;
            }

            .sidebar-hidden #sidebar {
                display: block !important;
            }
        }

        .table {
            position: relative;
        }

        .table-container {
            overflow-x: auto;
        }

        .main-padded {
            padding-top: 55%;
            /* Adjust the value as needed */
        }

        th {
            cursor: pointer;
        }
    </style>
</head>

<body>
    @include('bakpk.navbar')
    <!-- Show/Hide Button -->
    <button id="sidebarToggle" class="btn btn-secondary d-md-none">
        <i class="bi bi-list"></i>
    </button>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Menu -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link text-center" href="#"> Daftar Mahasiswa </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-center" href="#"> Daftar Pimpinan </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="main">
                <div class="table-container">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Daftar Akun Pimpinan</h1>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchBox" placeholder="Cari data...">
                        <button class="btn btn-primary" id="searchButton" type="button">Cari</button>
                    </div>
                    <!-- Table for Aduan -->
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">No</th>
                                    <th onclick="sortTable(1)">NIP</th>
                                    <th onclick="sortTable(2)">Nama</th>
                                    <th onclick="sortTable(3)">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>43321101</td>
                                    <td>Ahmad Jamaludin</td>
                                    <td>ahmad@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>43321102</td>
                                    <td>Bagas Setiawan</td>
                                    <td>bagas@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>43321103</td>
                                    <td>Chero Charizard</td>
                                    <td>chero@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    @include('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tableRows = document.querySelectorAll("table tbody tr");
            tableRows.forEach(row => {
                row.addEventListener("click", function(event) {
                    // Check if the clicked element is one of the ignored elements
                    if (event.target.tagName !== "SELECT" && event.target.tagName !== "BUTTON" &&
                        event.target.tagName !== "A") {
                        const id = this.querySelector("td:first-child").innerText;
                        window.location.href = `{{ route('pimpinan.detail_aduan', '') }}/${id}`;
                    }
                });

                row.addEventListener("mouseover", function() {
                    this.style.cursor = "pointer";
                });
                row.addEventListener("mouseout", function() {
                    this.style.cursor = "default";
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("sidebar");
            const sidebarToggle = document.getElementById("sidebarToggle");
            const body = document.body;
            sidebarToggle.addEventListener("click", function() {
                sidebar.classList.toggle("d-none");
                body.classList.toggle("sidebar-hidden");
                main.classList.toggle("main-padded");
            });
        });
    </script>
    <script>
        function isNumeric(str) {
            // Check if the string is a valid number
            return /^\d+$/.test(str);
        }

        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("sortable-table");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            /* Make a loop that will continue until no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /* Loop through all table rows (except the first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                    /* Get the two elements you want to compare, one from the current row and one from the next: */
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                    /* Check if the two rows should switch place, based on the direction, asc or desc: */
                    if (dir === "asc") {
                        if (isNumeric(x.innerHTML) && isNumeric(y.innerHTML)) {
                            // If both are numeric, compare as numbers
                            if (parseInt(x.innerHTML, 10) > parseInt(y.innerHTML, 10)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            // If not numeric, compare as strings
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    } else if (dir === "desc") {
                        if (isNumeric(x.innerHTML) && isNumeric(y.innerHTML)) {
                            // If both are numeric, compare as numbers
                            if (parseInt(x.innerHTML, 10) < parseInt(y.innerHTML, 10)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            // If not numeric, compare as strings
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                }
                if (shouldSwitch) {
                    /* If a switch has been marked, make the switch and mark that a switch has been done: */
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    // Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /* If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again. */
                    if (switchcount === 0 && dir === "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
</body>

</html>