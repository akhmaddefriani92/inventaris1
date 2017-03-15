<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $funcdb = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $funcdb->get_invoice($id);


  $get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  $level    = $get_user["level"];
  if ($level==1){


  
  echo "
  <div class='row'>
              <div class='col-md-6'>
                <label>No. Invoice</label>
                  <input type='hidden' class='form-control' name='id_invoice' value='$id' />
                  <input type='text' class='form-control' name='no_invoice' value='$data[no_invoice]' />
                </div> 
               <div class='col-md-6'>
                <label>Tanggal Invoice</label>
                  <input type='text' class='form-control input-tanggal' name='tanggal_invoice' id='tanggal_invoice' value='".date('Y-m-d',strtotime($data["tanggal_invoice"]))."' />
                </div> 
            </div>
            <br>

            <div class='row'>
              <div class='col-md-3'>
                <label>Bandara</label>
                  <input type='text' class='form-control' name='bandara' value='$data[bandara]' />
                </div> 
               <div class='col-md-3'>
                <label>Bulan</label>
                  <input type='text' class='form-control bulan' name='bulan' id='bulan' value='".$data["bulan"]."' />
                </div> 
                <div class='col-md-3'>
                <label>Tanggal Rekon</label>
            <input type='text' class='form-control input-tanggal' name='tanggal_rekon' id='tanggal_rekon' value='$data[tanggal_rekon]' />
                </div> 
                <div class='col-md-3'>
                <label><p style='font-size:small;'>Tanggal Invoice Diterima</p></label>
                  <input type='text' class='form-control input-tanggal' name='tanggal_invoice_diterima' id='tanggal_invoice_diterima' value='".date('Y-m-d',strtotime($data["tanggal_invoice_diterima"]))."' />
                </div> 

            </div>
            <br>

            <div class='row'>
              <div class='col-md-6'>
                <label>Rekon No</label>
                  <input type='text' class='form-control' name='rekon_no' value='$data[rekon_no]' />
                </div> 
               <div class='col-md-6'>
                <label>Rekon Data</label>";
                ?>
                  <input type='text' class='form-control' name='rekon_data'  value="<?php echo $data["rekon_data"];?>" />
                <?php 
                echo "  
                </div> 
                
            </div>
            <br>

            <div class='row'>
              <div class='col-md-3'>
                <label>Pengirim</label>
                  <input type='text' class='form-control' name='pengirim' value='$data[pengirim]' />
                </div> 
               <div class='col-md-3'>
                <label>Penerima</label>
                  <input type='text' class='form-control' name='penerima'  value='$data[penerima]' />
                </div> 
                <div class='col-md-6'>
                <label>Informasi Invoice</label>
                ";
                ?>
                  <input type='text' class='form-control' name='informasi_invoice'  value="<?php echo $data["informasi_invoice"];?>" />
                  <?php echo "
                </div> 
            </div>
            <br>

            <div class='row'>
              <div class='col-md-4'>
                <label>Jumlah</label>
                  <input type='text' class='form-control' name='jumlah' value='$data[jumlah]' />
                </div> 
               <div class='col-md-4'>
                <label>PPN</label>
                  <input type='text' class='form-control' name='ppn'  value='$data[ppn]' />
                </div> 
                <div class='col-md-4'>
                <label>Total</label>
                  <input type='text' class='form-control' name='total'  value='$data[total]' />
                </div> 
            </div>
            <br>

            <div class='row'>
              <div class='col-md-6'>
                <label>Kelengkapan Data</label>
                  <input type='text' class='form-control' name='kelengkapan_data' value='$data[kelengkapan_data]' />
                </div> 
               <div class='col-md-3'>
                <label>Tanggal Dibayar</label>
                <input type='text' class='form-control input-tanggal' name='tanggal_dibayar' id='tanggal_dibayar'  value='".$data["tanggal_dibayar"]."' />
                </div> 
                <div class='col-md-3'>
                <label>Bank</label>
                  <input type='text' class='form-control' name='bank'  value='$data[bank]' />
                </div> 
            </div>
            <br>

            <div class='row'>
              <div class='col-md-6'>
                <label>Keterangan</label>
                  <input type='text' class='form-control' name='keterangan' value='$data[keterangan]' />
                </div> 
               <div class='col-md-6'>
                <label>Upload Pdf</label>
                  <input type='file' name='pdf'  value='$data[pdf_files]' />
                </div> 
            </div>
            <br>

  ";
}else{
    echo "<div class='row'>
              <div class='col-md-6'>
                <label>Kelengkapan Data</label>
                  <input type='hidden' class='form-control' name='id_invoice' value='$id' />
                  <input type='text' class='form-control' name='kelengkapan_data' value='$data[kelengkapan_data]' />
                </div> 
               <div class='col-md-6'>
                <label>Tanggal Dibayar</label>
                    <input type='text' placeholder='isi tanggal dibayar'class='form-control'  name='tanggal_dibayar_date' value='$data[tanggal_dibayar]'id='tanggal_dibayar'   />
                  </div> 
          </div> 
          <br>
          <div class='row'>
                <div class='col-md-4'>
                <label>Bank</label>
                  <input type='text' class='form-control' name='bank'  value='$data[bank]' />
                </div> 
            
              <div class='col-md-8'>
                <label>Keterangan</label>
                  <input type='text' class='form-control' name='keterangan' value='$data[keterangan]' />
                </div>
          </div>";
  
}
    
?>
