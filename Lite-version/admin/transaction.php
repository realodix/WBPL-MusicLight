Halaman ini hanya dapat diakses ole Member and Admin. Halaman ini menampilkan Transaction ID, Username, Date, and Status dari transaksi. Tambahkan link untuk detail.php di setiap Transaction ID, sehingga pengguna dapat melihat rincian tentang transaksi dipilih. Member hanya dapat melihat his/her transactions. Admin dapat melihat semua transactions yang dibuat oleh dan dapat menghapusnya and approve each transaction. If Admin approves a transaction, validate if the Stock of the product is still bigger than or equal to the Quantity of product in transaction page. If the transaction is valid (Stock >= Quantity), do not forget to reduce Stock (as many as Quantity), and update the Date so it becomes the date when Admin approve the transaction. But if the transaction is not valid (Stock < Quantity) shows error message that tells users about the insufficient stock.

<?php



?>