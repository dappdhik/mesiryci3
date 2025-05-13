<div class="kasir p-3 bg-white rounded shadow-sm">
    <div class="mb-3">
        <h3 class="text-center fw-semibold mb-2">Kasir</h3>
        <h5 class="fw-medium">List Order</h5>
        <hr class="my-2">
    </div>

    <div class="table-responsive">
        <table class="table table-hover" id="orderTable">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th width="30%">Nama Barang</th>
                    <th width="15%">Jumlah</th>
                    <th width="20%">Harga</th>
                    <th width="20%">Subtotal</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody id="orderItems">
                <tr id="emptyRow">
                    <td colspan="6" class="text-center text-muted">Belum ada pesanan</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="table-active">
                    <th colspan="4" class="text-end">Total:</th>
                    <th id="totalHarga">Rp 0</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-grid gap-2 mt-3">
        <button class="btn btn-primary btn-lg" id="payButton" disabled>
            <i class="bi bi-credit-card"></i> Bayar (Rp <span id="totalPay">0</span>)
        </button>
    </div>

    <div class="mt-4 p-3 bg-light rounded">
        <h6 class="fw-medium mb-3">Informasi Pesanan</h6>
        <div id="orderInfo">
            <p class="text-muted">Belum ada pesanan</p>
        </div>
        <div class="text-end mt-2">
            <small class="text-muted"><?= date('d/m/Y H:i:s') ?></small>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let orders = [];
    let orderCounter = 1;

    function addToOrder(itemId, nama, harga, gambar) {
        if(orders.length === 0) {
            $('#emptyRow').hide();
        }

        const existingItem = orders.find(item => item.id === itemId);
        const quantityInput = $(`#foodCard-${itemId} input[type="number"]`);
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
    }

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
                            <button class="btn btn-outline-secondary" onclick="updateQty(${item.id}, -1)">-</button>
                            <input type="number" class="form-control text-center" value="${item.qty}" min="1"
                                   onchange="updateItemQty(${item.id}, this.value)">
                            <button class="btn btn-outline-secondary" onclick="updateQty(${item.id}, 1)">+</button>
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

    function updateQty(itemId, change) {
        const item = orders.find(item => item.id === itemId);
        if(item) {
            const newQty = item.qty + change;
            if(newQty > 0) {
                item.qty = newQty;
                item.subtotal = item.qty * item.harga;
                updateOrderDisplay();
            }
        }
    }

    function updateItemQty(itemId, newQty) {
        const item = orders.find(item => item.id === itemId);
        if(item && newQty > 0) {
            item.qty = parseInt(newQty);
            item.subtotal = item.qty * item.harga;
            updateOrderDisplay();
        }
    }

    function removeItem(itemId) {
        orders = orders.filter(item => item.id !== itemId);
        updateOrderDisplay();
    }

    $('#payButton').click(function() {
        if(orders.length > 0) {
            alert(`Total pembayaran: Rp ${$('#totalPay').text()}\n\nPesanan berhasil diproses!`);
            orders = [];
            orderCounter = 1;
            updateOrderDisplay();
        }
    });
</script>