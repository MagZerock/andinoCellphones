<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menu of cellPhone</title>
    <link rel="stylesheet" href="../../public/css/index.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar__container">
            <span class="navbar__logo">Cellphone System</span>
            <ul class="navbar__menu">
                <li><a href="../Controller/viewCellPhones.php" class="active">View Cellphones</a></li>
				<li><a href="./form.html">Add CellPhone</a></li>
            </ul>
        </div>
    </nav>
    <h1>Cell Phone</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Price</th>
                <th>Screen</th>
                <th>RAM</th>
                <th>Storage</th>
                <th>Camera</th>
                <th>Battery</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($cellphones) && count($cellphones) > 0): ?>
                <?php foreach($cellphones as $phone): ?>
                <tr>
                    <td><?= htmlspecialchars($phone->brand) ?></td>
                    <td><?= htmlspecialchars($phone->model) ?></td>
                    <td>$<?= htmlspecialchars($phone->price) ?></td>
                    <td><?= htmlspecialchars($phone->screen) ?></td>
                    <td><?= htmlspecialchars($phone->ram) ?></td>
                    <td><?= htmlspecialchars($phone->storage) ?></td>
                    <td><?= htmlspecialchars($phone->camera) ?></td>
                    <td><?= htmlspecialchars($phone->battery) ?></td>
                    <td>
                        <a href="../Controller/editCellPhone.php?id=<?= $phone->id ?>">Edit</a>
                        <form action="../Controller/deleteCellPhone.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $phone->id ?>">
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" style="text-align:center;">No cellphones found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
