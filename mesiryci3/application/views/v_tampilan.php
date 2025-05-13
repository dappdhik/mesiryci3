<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
            integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
            integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
            integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
            integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
            integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="<?= base_url('teamplate')?>/dist/css/adminlte.css"
        />
        <title>Kasir Sederhana</title>
    </head>
    <body>

        <div class="container-fluid " >
    <div class="row" >

        <div class="col-md-3 col-lg-2 bg-light shadow-sm p-0 " >
            <div class="d-flex flex-column h-100 p-3 mt-3" >
                <a href="<?= base_url('barang/index')?>" class="d-flex align-items-center mb-3 text-decoration-none text-dark">
                    <i class="bi bi-shop fs-4 me-2"></i>
                    <span class="fs-4 fw-semibold">Cames Food</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column gap-2 " >
                    <li class="nav-item">
                        <a href="<?= base_url('barang/makanan')?>" class="nav-link link-dark" aria-current="page">
                        <ion-icon name="pizza-outline"></ion-icon>
                                                        Makanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('barang/minuman')?>" class="nav-link link-dark">
                        <ion-icon name="beer-outline"></ion-icon>                                     Minuman
                        </a>
                    </li>

                    <hr>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/index')?>" class="nav-link link-dark">
                            admin
                        </a>
                    </li>



                </ul>

                <div class="mt-auto">
                    <div class="nav-item">
                        <a href="#" class="nav-link link-danger">
                            <i class="bi bi-box-arrow-left me-2"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-9 col-lg-10 ms-auto">

            <div class="d-flex p-2" style="width: 50rem;">
                                <input type="text" placeholder="cari makanan dan minuman" class="form-control me-2"/>
                                <button class="btn btn-sm btn-primary" type="submit">Cari</button>
                                </div>


            <div class="d-flex justify-content-between flex-grow-1" style="gap: 1rem;">
                <div class="container1 flex-grow-1 bg-body" style="width: 60%; gap: 1rem; height: 80vh; overflow-y: scroll;">
                    <?php if(isset($halaman)) {
                        $this->load->view($halaman, isset($data) ? $data : null);
                    } ?>
                </div>

                <div class="container2 bg-body-tertiary shadow-sm" style="width: 30% ">
                    <?php if(isset($kasir)) {
                        $this->load->view($kasir, isset($data) ? $data : null);
                    } else {
                        $this->load->view('pagedata/v_kasir'); // Load default kasir view if $kasir is not set

                    } ?>
                </div>
                </div>
        </div>
    </div>
</div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
         <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
         <script
            src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
            integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"
        ></script>
        <script src="<?= base_url('teamplate')?>/dist/js/adminlte.js"></script>
        <script>
            $(document).ready(function() {
                const STORAGE_KEY = 'kasir_orders';
                let orders = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
                let orderCounter = orders.length > 0 ? Math.max(...orders.map(item => item.no)) + 1 : 1;

                updateOrderDisplay();

                function saveOrdersToStorage() {
                    localStorage.setItem(STORAGE_KEY, JSON.stringify(orders));
                }

                window.addToOrder = function(itemId, nama, harga, gambar) {
                    if(orders.length === 0) {
                        $('#emptyRow').hide();
                    }

                    const existingItem = orders.find(item => item.id === itemId);
                    const quantityInput = $(`#foodCard-${itemId} .quantity-input, #drinkCard-${itemId} .quantity-input, #allCard-${itemId} .quantity-input`);
                    const qty = quantityInput ? parseInt(quantityInput.val()) || 1 : 1;

                    if(existingItem) {
                        existingItem.qty += qty;
                        existingItem.subtotal = existingItem.qty * existingItem.harga;
                    } else {
                        orders.push({
                            id: itemId,
                            no: orderCounter++,
                            nama: nama,
                            harga: parseInt(harga),
                            qty: qty,
                            subtotal: parseInt(harga) * qty,
                            gambar: gambar
                        });
                    }

                    if(quantityInput) quantityInput.val(0);

                    updateOrderDisplay();
                    saveOrdersToStorage();
                };

                function updateOrderDisplay() {
                    const orderTable = $('#orderItems');
                    const orderInfo = $('#orderInfo');
                    let total = 0;

                    orderTable.find('tr:not(#emptyRow)').remove();

                    orders.forEach(item => {
                        orderTable.append(`
                            <tr data-id="${item.id}">
                                <td>${item.no}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="${item.gambar}" class="rounded me-2" width="30" height="30">
                                        ${item.nama}
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group input-group-sm" style="width:100px">
                                        <button class="btn btn-outline-secondary btn-sm" onclick="updateQtyInOrder(${item.id}, -1)">-</button>
                                        <input type="number" class="form-control form-control-sm text-center" value="${item.qty}" min="1"
                                               onchange="updateItemQty(${item.id}, this.value)">
                                        <button class="btn btn-outline-secondary btn-sm" onclick="updateQtyInOrder(${item.id}, 1)">+</button>
                                    </div>
                                </td>
                                <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
                                <td>Rp ${item.subtotal.toLocaleString('id-ID')}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger" onclick="removeItem(${item.id})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `);

                        total += item.subtotal;
                    });

                    $('#totalHarga, #totalPay').text('Rp ' + total.toLocaleString('id-ID'));
                    $('#payButton').prop('disabled', orders.length === 0);

                    if(orders.length > 0) {
                        let infoHtml = '';
                        orders.forEach(item => {
                            infoHtml += `
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-semibold">- ${item.nama}</span>
                                        <span>${item.qty}x</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">Rp ${item.harga.toLocaleString('id-ID')}</small>
                                        <small class="text-success">Rp ${item.subtotal.toLocaleString('id-ID')}</small>
                                    </div>
                                </div>
                            `;
                        });
                        orderInfo.html(infoHtml);
                    } else {
                        orderInfo.html('<p class="text-muted">Belum ada pesanan</p>');
                        $('#emptyRow').show();
                    }
                }

                window.updateQtyInOrder = function(itemId, change) {
                    const item = orders.find(item => item.id === itemId);
                    if(item) {
                        const newQty = item.qty + change;
                        if(newQty > 0) {
                            item.qty = newQty;
                            item.subtotal = item.qty * item.harga;
                            updateOrderDisplay();
                            saveOrdersToStorage();
                        } else {
                            removeItem(itemId);
                        }
                    }
                };

                window.updateItemQty = function(itemId, newQty) {
                    const item = orders.find(item => item.id === itemId);
                    if(item && newQty > 0) {
                        item.qty = parseInt(newQty);
                        item.subtotal = item.qty * item.harga;
                        updateOrderDisplay();
                        saveOrdersToStorage();
                    }
                };

                window.removeItem = function(itemId) {
                    orders = orders.filter(item => item.id !== itemId);
                    updateOrderDisplay();
                    saveOrdersToStorage();
                    if (orders.length === 0) {
                        $('#emptyRow').show();
                    }
                };

                $('#payButton').click(function() {
                    if(orders.length > 0) {
                        alert(`Total pembayaran: Rp ${$('#totalPay').text()}\n\nPesanan berhasil diproses!`);
                        orders = [];
                        orderCounter = 1;
                        updateOrderDisplay();
                        localStorage.removeItem(STORAGE_KEY);
                    }
                });

                // Load orders on page load
                const storedOrders = localStorage.getItem(STORAGE_KEY);
                if (storedOrders) {
                    orders = JSON.parse(storedOrders);
                    orderCounter = orders.length > 0 ? Math.max(...orders.map(item => item.no)) + 1 : 1;
                    updateOrderDisplay();
                }
            });

            function updateQuantity(btn, change) {
                const input = btn.closest('.input-group').querySelector('.quantity-input');
                let newVal = parseInt(input.value) + change;
                if (newVal < 0) newVal = 0;
                input.value = newVal;
            }
        </script>
    </body>
</html>