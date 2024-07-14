<section style="height: 100vh;"  >
  <div style="margin: 20px;" >
    <h1 style="font-size: 2rem;" >Create Mahasiswa</h1>
  </div>

  <?php  
    
    include "dbconnect.php";

    $id = $_GET["id"] ?? '';

    if (!empty($id)) {
    $query = "SELECT * FROM mahasiswa WHERE id=$id";
    $result = $k->query($query);    
    if ($result->num_rows > 0) {
      $mahasiswa = $result->fetch_assoc();
      // echo $mahasiswa["nama"];
    }  else {
      echo "<p>Failed to retrieve data</p>";
    }
    }
  ?>
  
  <div class="card" style="margin: 10px; padding: 20px;" >
    <form action="<?php echo isset($id) && $id ? 'update-handler.php' : 'handler.php'; ?>"  method="post">
    <div style="display: flex; flex-direction:column; gap: 10px;" >
      <input id="id" name="id" value="<?php echo $id ?>"  type="hidden" />
      <div>
        <label  for="nim">NIM</label>
       <input  class="input" type="text" name="nim" id="nim" value="<?php echo !empty($id) ? htmlspecialchars($mahasiswa["nim"]) : ""; ?>">
      </div>
      <div>
        <label for="name">Name</label>
        <input class="input" type="text" name="name" id="name" value="<?php echo !empty($id) ? htmlspecialchars($mahasiswa["nama"]) : ""; ?>">
      </div>
      <div>
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select class="input select" name="jenis_kelamin" id="jenis_kelamin">
          <option disabled value="">Select Options</option>
          <option value="0">Laki-laki</option>
          <option value="1">Perempuan</option>
      </select>
      </div>
      <div>
        <label for="alamat">Alamat</label>
        <input class="input" type="text" name="alamat" id="alamat" value="<?php echo !empty($id) ? htmlspecialchars($mahasiswa["alamat"]) : ""; ?>">
      </div>
      <div>
              <label for="program_studi">Program Studi</label>
          <input class="input" type="text" name="program_studi" id="program_studi" value="<?php  echo !empty($id) ? htmlspecialchars($mahasiswa['program_studi']) : ""; ?>">
      </div>
    </div>
    <div style="display: flex; justify-content: end; align-items: end;" >
      <button type="submit" class="button" style="margin-top: 20px;" ><?php 
        if ($id) {
          echo "Update";
        } else {
          echo "Submit";
        }
       ?></button>
    </div>
  </form>
  

  </div>
</section>