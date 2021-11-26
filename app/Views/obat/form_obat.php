<form>
  <div class="modal fade" id="formObatModal" tabindex="-1" aria-labelledby="formObatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formObatModalLabel">Form Obat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_obat">
              </div>
            </div>

            <div class="mb-3 row">
              <label  class="col-sm-3 col-form-label">Harga Jual</label>
              <div class="col-sm-9">
                 <input type="number" class="form-control" name="harga_jual">
              </div>
            </div>

            <div class="mb-3 row">
              <label  class="col-sm-3 col-form-label">Harga Beli</label>
              <div class="col-sm-9">
                 <input type="number" class="form-control" name="harga_beli" >
              </div>
            </div>

            <div class="mb-3 row">
              <label  class="col-sm-3 col-form-label">Qty</label>
              <div class="col-sm-9">
                 <input type="number" class="form-control" name="qty">
              </div>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="simpan_data()" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form> 

<script>
function simpan_data(){
  this.showLoading()
  var data={
    nama_obat:document.getElementsByName('nama_obat')[0].value, 
    harga_jual:document.getElementsByName('harga_jual')[0].value,
    harga_beli:document.getElementsByName('harga_beli')[0].value,
    qty:document.getElementsByName('qty')[0].value
  }
  if (this.editId !=''){
    data.id=this.editId
  }

  fetch("<?php echo site_url('admin/obat') ?>", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    }, 
    body: JSON.stringify(data)
  }).then(response => response.json())
  .then(response => {
    alert(response.pesan)
    window.location.reload(false);
  });
  this.hideLoading()
}
</script>