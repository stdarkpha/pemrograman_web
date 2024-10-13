<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<div class="max-w-screen-md overflow-hidden mx-auto py-16">
    <?php if (isset($_POST['submit'])): ?>
        <?php
        // define variable
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';;
        $birth = $_POST['birth'] ?? '';;
        $gender = $_POST['gender'] ?? '';;
        $hobby =  isset($_POST['hobby']) ? implode(', ', $_POST['hobby']) : '';
        $message = $_POST['message'] ?? '';

        include 'utils/connection.php';

        $sql = "INSERT INTO survey (name, phone, birth, gender, hobby, message) VALUES ('$name', '$phone', '$birth', '$gender', '$hobby', '$message')";

        if ($conn->query($sql) === TRUE) {
            // swal success
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        } else {
            // swal error
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Data gagal disimpan',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        }

        $conn->close();

        ?>
        <div class="text-center">
            <h1 class="text-2xl font-semibold">
                Terima kasih <?= $_POST['name'] ?>! Telah mengisi survey.
            </h1>
            <p class="mb-4">
                Berikut adalah data yang kamu masukkan:
            </p>
            <ul class="text-left">
                <li>Nama: <?= $_POST['name'] ?? '' ?></li>
                <li>Telepon: <?= $_POST['phone'] ?? '' ?></li>
                <li>Tanggal Lahir: <?= $_POST['birth'] ?? '' ?></li>
                <li>Jenis Kelamin: <?= $_POST['gender'] ?? '' ?></li>
                <li class="capitalize">Hobby:
                    <?php
                    if (isset($_POST['hobby'])) {
                        $hobbies = (array)$_POST['hobby'];
                        $lastHobby = array_pop($hobbies);
                        echo implode(', ', $hobbies);
                        if (!empty($hobbies)) {
                            echo ', dan ';
                        }
                        echo $lastHobby;
                    }
                    ?>
                </li>
                <li>Pesan: <?= $_POST['message'] ?></li>
            </ul>
        </div>
        <a href="index.php?page=survey" class="w-full mt-8 btn btn-primary">Kembali</a>
    <?php else: ?>
        <div role="tablist" class="tabs tabs-lifted">
            <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Isi Survey" />
            <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                <div>
                    <h1 class="text-2xl font-semibold text-center mb-2">Survey Pengunjung</h1>
                    <p class="mb-8 text-center">
                        Silahkan isi form berikut untuk membagikan pendapatmu terkait website ini.
                    </p>
                    <form method="POST" action="index.php?page=survey" class="flex flex-col gap-6">
                        <div class="flex gap-4 items-center w-full">
                            <label class="w-full input input-bordered flex items-center gap-2">
                                <input name="name" type="text" class="grow" placeholder="Nama" />
                            </label>
                            <label class="w-full input input-bordered flex items-center gap-2">
                                <input name="phone" type="text" class="grow" placeholder="Telepon" />
                            </label>
                        </div>

                        <div class="w-full">
                            <p class="mb-2">Tanggal Lahir</p>
                            <label class="input input-bordered flex items-center gap-2">
                                <input name="birth" type="date" class="grow" />
                            </label>
                        </div>

                        <div class="flex gap-4 items-center w-full">
                            <div class="w-full">
                                <p class="mb-2">Jenis Kelamin</p>
                                <div class="flex items-center gap-4">
                                    <label class="cursor-pointer flex items-center gap-2">
                                        <input type="radio" name="gender" value="laki-laki" class="radio w-4 h-4" />
                                        <span>Laki-Laki</span>
                                    </label>
                                    <label class="cursor-pointer flex items-center gap-2">
                                        <input type="radio" name="gender" value="perempuan" class="radio w-4 h-4" />
                                        <span>Perempuan</span>
                                    </label>
                                </div>
                            </div>
                            <div class="w-full">
                                <p class="mb-2">Pilih Hobby</p>
                                <div class="flex gap-4">
                                    <label class="cursor-pointer flex items-center gap-2">
                                        <input type="checkbox" name="hobby[]" class="checkbox w-4 h-4" value="lari" />
                                        <span>Lari</span>
                                    </label>
                                    <label class="cursor-pointer flex items-center gap-2">
                                        <input type="checkbox" name="hobby[]" class="checkbox w-4 h-4" value="renang" />
                                        <span>Renang</span>
                                    </label>
                                    <label class="cursor-pointer flex items-center gap-2">
                                        <input type="checkbox" name="hobby[]" class="checkbox w-4 h-4" value="makan" />
                                        <span>Makan</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <textarea name="message" class="textarea textarea-bordered" placeholder="Pesan.."></textarea>

                        <button name="submit" type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>

            <input
                type="radio"
                name="my_tabs_2"
                role="tab"
                class="tab"
                aria-label="Daftar Survey"
                checked="checked" />
            <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-center mb-2">Survey Pengunjung</h1>
                    <button id="batch" onclick="batchRemove()" class="btn hidden btn-sm btn-error"></button>
                </div>
                <?php
                include 'utils/connection.php';

                $sql = "SELECT * FROM survey ORDER BY id DESC";

                $result = $conn->query($sql);
                ?>
                <?php if ($result->num_rows > 0): ?>
                    <div class="overflow-hidden max-w-full">
                        <div class="overflow-auto w-full max-h-[320px]">
                            <table class="table table-pin-rows table-pin-cols">
                                <thead>
                                    <tr>
                                        <th><input onclick="toggleAll(this)" class="checkbox w-4 h-4" type="checkbox" name="" id=""></th>
                                        <td class="min-w-[120px]">Name</td>
                                        <td>Umur</td>
                                        <td>Jenis Kelamin</td>
                                        <td>Phone</td>
                                        <td>Aksi</td>
                                        <th>No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = $result->fetch_assoc()): ?>
                                        <tr class="align-middle">
                                            <th><input onclick="showRemoveBatch()" class="checkbox w-4 h-4" type="checkbox" value="<?= $row['id'] ?>"></th>
                                            <td class="capitalize align-middle">
                                                <?= $row['name'] ?>
                                            </td>
                                            <td class="capitalize align-middle whitespace-nowrap">
                                                <?php
                                                $birthDate = new DateTime($row['birth']);
                                                $currentDate = new DateTime();
                                                $age = $currentDate->diff($birthDate)->y;
                                                echo $age . ' tahun';
                                                ?>
                                            </td>
                                            <td class="capitalize align-middle">
                                                <?= $row['gender'] ?>
                                            </td>
                                            <td class="capitalize align-middle">
                                                <?= $row['phone'] ?>
                                            </td>
                                            <td class="capitalize align-middle flex gap-4">
                                                <button class="btn btn-xs btn-primary">Edit</button>
                                                <button onclick="removeSurvey(<?= $row['id'] ?>)" class="btn btn-xs btn-error">Hapus</button>
                                            </td>
                                            <th class="font-normal"><?= str_pad($i++, 2, '0', STR_PAD_LEFT) ?></th>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th></th>
                                        <td>Name</td>
                                        <td>Tanggal Lahir</td>
                                        <td>Jenis Kelamin</td>
                                        <td>Phone</td>
                                        <td>Aksi</td>
                                        <th>No</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>

                    <script>
                        function showRemoveBatch() {
                            const checkboxes = document.querySelectorAll('.table input[type="checkbox"]');
                            const batchButton = document.getElementById('batch');
                            const selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
                            batchButton.classList.toggle('hidden', selectedCheckboxes.length === 0);
                            batchButton.textContent = `Hapus Pilihan (${selectedCheckboxes.length})`;
                        }

                        // function select all input checkbox in table
                        function toggleAll(e) {
                            e.checked = !e.checked;
                            const checkboxes = document.querySelectorAll('.table input[type="checkbox"]');
                            const batchButton = document.getElementById('batch');
                            batchButton.classList.toggle('hidden');
                            checkboxes.forEach(checkbox => {
                                checkbox.checked = !checkbox.checked;
                            });
                            batchButton.textContent = e.checked ? `Hapus Pilihan (${checkboxes.length})` : '';
                        }

                        // function remove survey
                        function removeSurvey(id) {
                            Swal.fire({
                                title: 'Apakah kamu yakin?',
                                text: "Data yang dihapus tidak bisa dikembalikan!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = `index.php?page=survey&delete=${id}`;
                                }
                            });
                        }

                        function batchRemove() {
                            Swal.fire({
                                title: 'Apakah kamu yakin?',
                                text: "Data yang dihapus tidak bisa dikembalikan!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const checkboxes = document.querySelectorAll('.table input[type="checkbox"]');
                                    const selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
                                    const selectedIds = selectedCheckboxes.map(checkbox => checkbox.value);
                                    window.location.href = `index.php?page=survey&delete=${selectedIds.join(',')}`;
                                }
                            });
                        }
                    </script>
                <?php else: ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 mx-auto my-4" viewBox="0 0 256 256">
                        <path fill="currentColor" d="m198.24 62.63l15.68-17.25a8 8 0 0 0-11.84-10.76L186.4 51.86A95.95 95.95 0 0 0 57.76 193.37l-15.68 17.25a8 8 0 1 0 11.84 10.76l15.68-17.24A95.95 95.95 0 0 0 198.24 62.63M48 128a80 80 0 0 1 127.6-64.25l-107 117.73A79.63 79.63 0 0 1 48 128m80 80a79.55 79.55 0 0 1-47.6-15.75l107-117.73A79.95 79.95 0 0 1 128 208" />
                    </svg>
                    <p class="text-center">Belum ada data survey</p>
                <?php endif; ?>
                <?php $conn->close(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
if (isset($_GET['delete'])) {
    include 'utils/connection.php';

    $ids = $_GET['delete'];
    // check if ids is array
    if (strpos($ids, ',') !== false) {
        $ids = explode(',', $ids);
        $ids = array_map('intval', $ids); // Ensure all IDs are integers
        $ids = implode("','", $ids);
    } else {
        $ids = intval($ids); // Ensure the ID is an integer
    }

    $sql = "DELETE FROM survey WHERE id IN ('$ids')";

    if ($conn->query($sql) === TRUE) {
        // swal success
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil dihapus',
                showConfirmButton: false,
                timer: 1500
            });

            setTimeout(() => {
                window.location.href = 'index.php?page=survey';
            }, 1500);
        </script>";
    } else {
        // swal error
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data gagal dihapus',
                showConfirmButton: false,
                timer: 1500
            });

            setTimeout(() => {
                window.location.href = 'index.php?page=survey';
            }, 1500);
        </script>";
    }

    $conn->close();
}
