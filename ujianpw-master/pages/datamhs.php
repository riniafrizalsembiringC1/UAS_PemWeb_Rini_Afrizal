<section class="section is-title-bar">
    <div class="level">
      <div class="level-left">
        <div class="level-item">
          <ul>
            <li>Admin</li>
            <li>Data Mahasiswa</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="hero is-hero-bar">
    <div class="hero-body">
    
      <div class="level">
        <div class="level-left">
          <div class="level-item"><h1 class="title">
            Data Mahasiswa
          </h1></div>
        </div>
        <div class="level-right" style="display: none;">
          <div class="level-item"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section is-main-section">
    <a href="?page=create-mahasiswa">
      <button class="button" style="margin-bottom: 10px;" >Create Mahasiswa</button>
    </a>
    <div class="card has-table has-mobile-sort-spaced">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Mahasiswa
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <div class="b-table has-pagination">
          <div class="table-wrapper has-mobile-cards">
            <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
              <thead>
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Program Studi</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
               <?php 
                include 'dbconnect.php';

                if ($k->connect_error) {
                  die("Connection failed: " . $k->connect_error);
                }

                $sql = 'SELECT * FROM mahasiswa';
                $result = $k->query($sql);
                // $result = $prepare->execute();
                if ($result->num_rows > 0) {
                  $no = 1;
                  while($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row["nama"];

                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row["nim"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    if ($row["jenis_kelamin"] == 0) {
                       echo "<td>" . "Laki-Laki"  . "</td>";
                    } else {
                       echo "<td>" . "Perempuan"  . "</td>";
                    }
                    echo "<td>" . $row["alamat"] . "</td>";
                    echo "<td>" . $row["program_studi"] . "</td>";
                    echo "<td class='is-actions-cell' style='margin: 0'>
                          <div class='buttons is-right' style='display: flex; flex-direction: column'>
                            <a class='button is-small is-primary' href='index.php?page=edit-mahasiswa&id=$id'>
                              <span class='icon'><i class='mdi mdi-pencil'></i></span>
                            </a>
                            <a  class='button is-small is-danger jb-modal' href='delete.php?id=$id'>
                              <span class='icon'><i class='mdi mdi-trash-can'></i></span>
                            </a>
                          </div>
                        </td>";
                    echo "<tr>";
                  } 
                } else {
                  echo "<tr><td colspan='6'> No Result found </td></tr>";
                }
              
              ?>
             
              <!-- <tr>
                <td>1</td>
                <td>Rebecca Bauch</td>
                <td>Daugherty-Daniel</td>
                <td>South Cory</td>
                <td>Jalan Yudistira No. 5 Semarang</td>
                <td>Sistem Informasi S-1</td>
                <td class="is-actions-cell">
                  <div class="buttons is-right">
                    <a class="button is-small is-primary" href="">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </a>
                    <a class="button is-small is-danger jb-modal" href="">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </a>
                  </div>
                </td>
              </tr> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>