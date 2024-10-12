<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<div class="max-w-screen-sm mx-auto py-16">
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

        $sql = "INSERT INTO contact (name, phone, birth, gender, hobby, message) VALUES ('$name', '$phone', '$birth', '$gender', '$hobby', '$message')";

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
                Terima kasih <?= $_POST['name'] ?>! Telah menghubungi saya.
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
        <a href="index.php?page=contact" class="w-full mt-8 btn btn-primary">Kembali</a>
    <?php else: ?>
        <h1 class="text-2xl font-semibold text-center mb-2">Kontak Saya</h1>
        <p class="mb-8 text-center">
            Silahkan isi form di bawah ini untuk menghubungi saya. Saya akan segera merespon pesan Anda.
        </p>
        <form method="POST" action="index.php?page=contact" class="flex flex-col gap-6">
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

    <?php endif; ?>
</div>