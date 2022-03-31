    <script>
        function getReg() {
            var x = document.getElementById('no_reg').value;
            if (x == "") {

                document.getElementById('sex').value = "";
                document.getElementById('layanan').value = "";
                document.getElementById('dokter').value = "";
                document.getElementById('nama').value = "";
                document.getElementById('alamat').value = "";
                document.getElementById('tgl_lahir').value = "";
                document.getElementById('umur').value = "";
                document.getElementById('no_tlp').value = "";
                document.getElementById('jaminan').value = "";

            } else {
                $.ajax({
                    type: "post",
                    url: "getRegAjax.php",
                    data: {
                        kd_reg: x
                    },
                    success: function(data) {
                        data = $.parseJSON(data);
                        // $('#no_reg').val(data2['aj_id_nm_pasien']);
                        $('#sex').val(data['aj_id_sex']);
                        $('#layanan').val(data['aj_tl_layanan']);
                        $('#dokter').val(data['aj_tl_dokter']);
                        $('#nama').val(data['aj_id_nama']);
                        $('#alamat').val(data['aj_id_jalamat']);
                        $('#tgl_lahir').val(data['aj_id_tanggal_lahir']);
                        $('#umur').val(data['aj_id_umur']);
                        $('#no_tlp').val(data['aj_id_no_tlp']);
                        $('#jaminan').val(data['aj_tl_jaminan']);

                    }


                });

            }
        }
    </script>