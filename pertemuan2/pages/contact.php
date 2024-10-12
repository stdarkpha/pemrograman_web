<div class="max-w-sm mx-auto py-16">
    <?php if (isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])): ?>
        <?php
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        ?>
        <div class="text-center">

            <h1 class="text-2xl font-semibold">Thank you for Contacting us!</h1>
            <p class="mb-4">Here is the information you submitted:</p>
            <ul class="text-left">
                <li>Email: <?= $email ?></li>
                <li>Phone: <?= $phone ?></li>
                <li>Message: <?= $message ?></li>
            </ul>
        </div>
        <a href="index.php?page=contact" class="w-full mt-8 btn btn-primary">Back</a>
    <?php else: ?>
        <h1 class="text-2xl font-semibold">Contact Us</h1>
        <p class="mb-4">Fill out the form below to contact us.</p>
        <form method="POST" action="index.php?page=contact" class="flex flex-col gap-4">
            <label class="input input-bordered flex items-center gap-2">

                <input required name="email" type="text" class="grow" placeholder="Email" />
            </label>
            <label class="input input-bordered flex items-center gap-2">

                <input required name="phone" type="text" class="grow" placeholder="Phone" />
            </label>
            <textarea required name="message" class="textarea textarea-bordered" placeholder="Messages"></textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    <?php endif; ?>
</div>