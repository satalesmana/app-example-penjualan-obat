<form action="" method="POST">
    <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Tipe Pembeli</label>
        <div class="col-sm-10">
            <select onchange="on_change_type()" name="tipe_pembeli" id="tipe_pembeli" class="form-control" >
                <option selected value="Member">Member</option>
                <option value="Pelanggan Toko">Pelanggan Toko</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Nama Member / Pelanggan</label>
        <div class="col-sm-10" id="input_member">
            <div class="input-group mb-3" >
                <input id="input_member_value" readonly type="text" class="form-control" placeholder="Nama Member" aria-describedby="basic-addon2">
                <button 
                    onclick="modal_toogle()"
                    type="button" 
                    class="btn btn-primary" 
                    id="basic-addon2">
                    Cari Member
                </button>
            </div>
        </div>

        <div class="col-sm-10" id="input_pelanggan_toko">
            <input type="text" class="form-control" name="nama_member" >
        </div>
    </div>

    <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Tanggal Pembelian</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" >
        </div>
    </div>

    <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Item Obat</label>
        <div class="col-sm-10">
            <select name="item_obat" class="form-control">
                <option value="0">---Pilih Obat---</option>
                <?php foreach($obat_list as $row){ ?>
                    <option value="<?php echo $row['id']; ?>"> <?php echo $row['nama_obat']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Qty</label>
        <div class="col-sm-10">
            <input class="form-control" name="qty_beli" type="number">
        </div>
    </div>

    <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10">
            <button class="btn btn-primary" type="button" id="btn_add">Add Record</button>
            <button class="btn btn-success" type="submit" >Submit</button>
        </div>
    </div>

    <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Paramex</td>
                        <td>2</td>
                        <td>1000</td>
                        <td>2000</td>
                        <td>Delete</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Panadol</td>
                        <td>2</td>
                        <td>1000</td>
                        <td>2000</td>
                        <td>Delete</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10" >
            <input type="text" readonly style="width: 40%; float:right" class="form-control " name="total_bayar">
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="memberModalLabel">Daftar Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Full Name</th>
                <th scope="col">User Alias</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no= 1; foreach($users as $row){ ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $row['emil']; ?></td>
                <td><?php echo $row['namaPengguna']; ?></td>
                <td><?php echo $row['userAlias']; ?></td>
                <td>
                    <button onclick="select_item_member('<?php echo $row['emil'].'-'.$row['namaPengguna']; ?>')" 
                        class="btn btn-info btn-sm"> Add Item </button>
                </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    var input_member = document.getElementById("input_member");
    var input_pelanggan = document.getElementById("input_pelanggan_toko");
    var type = document.getElementById("tipe_pembeli");
    var input_member_value = document.getElementById("input_member_value");

    
    input_pelanggan.style.display = "none"
    function on_change_type(){
        var valud = type.selectedOptions[0].value;
        input_member.style.display = "none"
        input_pelanggan.style.display = "none"

        if(valud ==='Member'){
            input_member.style.display = "block"
            input_pelanggan.style.display = "none"
        }else{
            input_member.style.display = "none"
            input_pelanggan.style.display = "block"
        }
    }

    function modal_toogle(){
        var memberModal = new bootstrap.Modal(document.getElementById('memberModal'), {
            keyboard: false
        }); 

        memberModal.toggle();
    }
    
    function select_item_member(value){

        input_member_value.value = value;
        //modal_toogle()
    }



</script>