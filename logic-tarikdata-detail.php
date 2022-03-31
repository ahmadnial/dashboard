<?php
                                                        include "conn.php";

                                                        if (isset($_POST['gass'])) {
                                                            $startDate = $_POST['start'];
                                                            $endDate = $_POST['end'];
                                                            $layanan = $_POST['layanan'];
                                                            // $jaminan = $_POST['jaminan'];
                                                            $no = 1;
                                                            $sql = " SELECT     aa.fd_tgl_masuk, aa.fs_jam_masuk, aa.fd_tgl_entry, aa.fs_jam_entry, aa.fs_kd_reg, aa.fs_mr, bb.fs_nm_pasien, 
                                                                       ISNULL(cc.fs_nm_layanan, '??') fs_nm_layanan, ISNULL(gg.fs_nm_instalasi,'??') fs_nm_instalasi, 
                                                                       ISNULL(lt.FS_NM_FLANTAI,'') FS_NM_FLANTAI, 
                                                                       CASE fn_kunjunganke WHEN '1' THEN 'BARU' ELSE 'LAMA' END fn_kunjunganke, 
                                                                       CASE bb.fn_kunjungan_ke WHEN '1' THEN 'BARU' ELSE 'LAMA' END fn_kunjungan_rs, 
                                                                       CASE mr.fn_cetak WHEN 0 then 'NOT PRINTED' ELSE 'Printed' end fs_cetak , 
                                                                       ISNULL(dd.fs_nm_tipe_jaminan,'??') fs_nm_tipe_jaminan, ISNULL(ee.fs_nm_user,'??') fs_nm_user, 
                                                                       ISNULL(ff.fs_nm_karcis,'??') fs_nm_karcis, ISNULL(hh.fs_nm_cara_masuk_dk,'??') fs_nm_cara_masuk_dk, 
                                                                       ISNULL(ii.fs_nm_rujukan,'  ') fs_nm_rujukan, ISNULL(ww.fs_nm_peg,'??') fs_nm_medis, 
                                                                       aa.fn_karcis, isnull(tt.fn_sub_total,0)fn_sub_total, aa.fn_karcis+isnull(tt.fn_sub_total,0) as fn_total, 
                                                                       aa.fn_kas_karcis+isnull(tt.fn_kas,0) as fn_kas, aa.fn_karcis_sisa+isnull(tt.fn_sisa,0) as fn_sisa, 
                                                                       aa.fd_tgl_void, aa.fs_jam_void, ISNULL(jj.fs_nm_user, '') fs_nm_user_void,  
                                                                       aa.fs_no_peserta, ISNULL(kk.fs_nm_status_peserta,' ') fs_nm_status_peserta, zz2.fs_nm_sesion_poli, 
                                                                       substring(aa.fs_mr,8,2)+'-'+substring(aa.fs_mr,10,2)+'-'+substring(aa.fs_mr,12,2)+'-'+substring(aa.fs_mr,14,2) AS fs_mr_td8, 
                                                                       ISNULL(fs_no_sjp,'??')fs_no_sjp, ISNULL(af.fs_msg_user, ' ') fs_keterangan,
                                                                       CASE ISNULL(ii.fb_dokter_luar,0) WHEN 0 then ' ' else 'Dokter/Bidan Luar' end fb_dokter_luar, 
                                                                       ISNULL(bb.fs_tlp_pasien,'??') fs_tlp_pasien, ISNULL(sex.FS_NM_JENIS_KELAMIN,'??') fs_sex, 
                                                                       ISNULL(ll.fs_nm_kelurahan,'??') fs_nm_kelurahan, 
                                                                       ISNULL(mm.fs_nm_kecamatan,'??') fs_nm_kecamatan, 
                                                                       ISNULL(nn.fs_nm_kabupaten,'??') fs_nm_kabupaten, 
                                                                       ISNULL(oo.fs_nm_propinsi,'??') fs_nm_propinsi, 
                                                                       ISNULL(dk.fs_nm_instalasi_dk,'??') fs_nm_instalasi_dk, 
                                                                       ISNULL(kk2.fs_nm_kelas,ISNULL(kk3.fs_nm_kelas,'??')) fs_nm_kelas, 
                                                                       (substring(ISNULL(rm.fs_umur,'0000-00-00'),1,3)+' Thn '+substring(ISNULL(rm.fs_umur,'0000-00-00'),5,2)+' bln ' 
                                                                       +right(ISNULL(rm.fs_umur,'0000-00-00'),2)+' hr')as fs_umur, 
                                                                       bb.fd_tgl_lahir, bb.fs_alm_pasien + ' ' + bb.fs_alm2_pasien as fs_alamat, 
                                                                       ISNULL(fs_nm_agama,'??') fs_nm_agama, aa.fs_anamnese, 
                                                                       ISNULL(fs_nm_pendidikan_dk,'??') fs_nm_pendidikan_dk, 
                                                                       ISNULL(fs_nm_pekerjaan_dk,'??') fs_nm_pekerjaan_dk, 
                                                                       ISNULL(fs_nm_status_kawin_dk,'??') fs_nm_status_kawin_dk, 
                                                                       ISNULL(fs_nm_grup_jaminan,'??') fs_nm_grup_jaminan, 
                                                                       ISNULL(ww.fs_nm_peg,'??') fs_nm_medis, bb.fs_mr_lama, 
                                                                       ISNULL(ww2.fs_nm_peg, '??') fs_nm_medis_sekunder, 
                                                                       ISNULL(bb.fs_kota_pasien,'')fs_kota_pasien, 
                                                                       ISNULL(bb.fs_no_kk, '') fs_no_kk, ISNULL(ae.fs_jns_peserta,'??') fs_jns_peserta, 
                                                                       ISNULL(bb.fs_email, '') fs_email, ISNULL (ka.fs_nm_kamar,'') fs_nm_kamar, 
                                                                       ISNULL(be.fs_nm_bed, '')fs_nm_bed, ISNULL(ba.fs_nm_bangsal,'') fs_nm_bangsal, 
                                                                       ISNULL(ag.FS_NO_POLIS, '')fs_no_polis,
                                                                       ISNULL(ag.FS_KD_BU, '')fs_kd_bu, 
                                                                       ISNULL(xx.fs_nm_bu,'')fs_nm_bu, 
                                                                       ISNULL(hh1.fs_kd_caramasuk_inap, '') fs_kd_caramasuk_inap, 
                                                                       ISNULL(hh2.fs_nm_caramasuk_inap, '') fs_nm_caramasuk_inap, 
                                                                       CASE aa.fb_dpp 
                                                                       WHEN 1 THEN 'Dokter Pilihan Pasien' 
                                                                              ELSE 'Dokter Pilihan RS' 
                                                                       END as fs_nm_dpp, 
                                                                       ISNULL(ji.fs_nm_jenis_inap, '')fs_nm_jenis_inap, ISNULL(ji.fs_kd_jenis_inap, '')fs_kd_jenis_inap, 
                                                                       ISNULL(aa.fs_nm_penjamin, ' ') fs_nm_penjamin, 
                                                                       ISNULL(aa.fs_alm_penjamin, ' ') fs_alm_penjamin, 
                                                                       ISNULL(aa.fs_no_telp_penjamin, ' ') fs_no_telp_penjamin, 
                                                                       ISNULL(aa.fs_uraian_dokter, ' ') fs_uraian_dokter, 
                                                                       ISNULL(sk.fs_nm_suku,' ') fs_nm_suku, 
                                                                       ISNULL(pt.fs_nm_perusahaan,' ') fs_nm_perusahaan, 
                                                                       ISNULL(bb.fs_nm_ibu_kandung,' ') fs_nm_ibu_kandung, ISNULL(bb.fs_nm_keluarga,' ') fs_nm_keluarga, 
                                                                       ISNULL(bb.fs_hub_keluarga,' ') fs_hub_keluarga, 
                                                                       ISNULL(bb.fs_jenis_id, '') fs_jenis_id, 
                                                                       ISNULL(bb.fs_kd_identitas, '') fs_kd_identitas, 
                                                                       CASE bb.fs_warga_negara WHEN 'I' THEN 'Indonesia' ELSE 'ASING' END as fs_nm_wn, 
                                                                       ISNULL(nd.fs_nm_negara_indonesia,' ') fs_nm_negara_indonesia, 
                                                                       ISNULL(bk2.fs_nm_cara_booking_dk,' ') fs_nm_cara_booking_dk
                                                            FROM       ta_registrasi aa 
                                                            LEFT JOIN  tc_mr bb ON aa.fs_mr = bb.fs_mr 
                                                            LEFT JOIN  ta_layanan cc ON aa.fs_kd_layanan = cc.fs_kd_layanan 
                                                            LEFT JOIN  TL_FLANTAI lt ON left(cc.fs_kd_fbagian,4) = lt.FS_KD_FLANTAI 
                                                            LEFT JOIN  ta_tipe_jaminan dd ON aa.fs_kd_tipe_jaminan = dd.fs_kd_tipe_jaminan 
                                                            LEFT JOIN  tz_user ee ON aa.fs_kd_petugas = ee.fs_kd_user 
                                                            LEFT JOIN  ta_karcis ff ON aa.fs_kd_karcis = ff.fs_kd_karcis 
                                                            LEFT JOIN  ta_instalasi gg ON cc.fs_kd_instalasi = gg.fs_kd_instalasi 
                                                            LEFT JOIN  ta_cara_masuk_dk hh ON aa.fs_kd_cara_masuk_dk = hh.fs_kd_cara_masuk_dk 
                                                            LEFT JOIN  ta_reg_inap hh1 ON aa.fs_kd_reg = hh1.fs_kd_reg 
                                                            LEFT JOIN  ta_caramasuk_inap hh2 ON hh1.fs_kd_caramasuk_inap = hh2.fs_kd_caramasuk_inap 
                                                            LEFT JOIN  ta_rujukan ii ON aa.fs_kd_rujukan = ii.fs_kd_rujukan 
                                                            LEFT JOIN  tz_user jj ON aa.fs_kd_petugas_void = jj.fs_kd_user 
                                                            LEFT JOIN  ta_status_peserta kk ON aa.fs_kd_status_peserta = kk.fs_kd_status_peserta 
                                                            LEFT JOIN  ta_pekerjaan_dk qq ON bb.fs_kd_pekerjaan_dk = qq.fs_kd_pekerjaan_dk 
                                                            LEFT JOIN  ta_pendidikan_dk rr ON bb.fs_kd_pendidikan_dk = rr.fs_kd_pendidikan_dk 
                                                            LEFT JOIN  ta_status_kawin_dk ss ON bb.fs_kd_status_kawin_dk = ss.fs_kd_status_kawin_dk 
                                                            LEFT JOIN  ta_trs_tdk_umum tt ON aa.fs_kd_trs_tindakan = tt.fs_kd_trs 
                                                            LEFT JOIN  td_peg ww ON aa.fs_kd_medis = ww.fs_kd_peg 
                                                            LEFT JOIN  td_peg ww2 ON hh1.fs_kd_medis_sekunder = ww2.fs_kd_peg 
                                                            LEFT JOIN  ta_trs_mr_mutasi mr ON aa.fs_kd_reg = mr.fs_kd_mutasi 
                                                            LEFT JOIN  TA_REG_MASUK rm ON aa.fs_kd_reg = rm.fs_kd_reg 
                                                            LEFT JOIN  ta_kelurahan ll ON bb.fs_kd_kelurahan = ll.fs_kd_kelurahan 
                                                            LEFT JOIN  ta_kecamatan mm ON ll.fs_kd_kecamatan = mm.fs_kd_kecamatan 
                                                            LEFT JOIN  ta_kabupaten nn ON mm.fs_kd_kabupaten = nn.fs_kd_kabupaten 
                                                            LEFT JOIN  ta_propinsi oo ON nn.fs_kd_propinsi = oo.fs_kd_propinsi 
                                                            LEFT JOIN  ta_agama pp ON bb.fs_kd_agama = pp.fs_kd_agama 
                                                            LEFT JOIN  TA_JENIS_KELAMIN sex ON bb.FS_JNS_KELAMIN = sex.FS_KD_JENIS_KELAMIN 
                                                            LEFT JOIN  ta_jaminan zz on dd.fs_kd_jaminan=zz.fs_kd_jaminan 
                                                            LEFT JOIN  ta_grup_jaminan ab on ab.fs_kd_grup_jaminan=zz.fs_kd_grup_jaminan 
                                                            LEFT JOIN  ta_instalasi_dk dk on gg.fs_kd_instalasi_dk = dk.fs_kd_instalasi_dk 
                                                            LEFT JOIN  ta_kelas kk2 on aa.fs_kd_kelas = kk2.fs_kd_kelas 
                                                            LEFT JOIN  TA_SESION_POLI zz2 ON aa.fs_kd_sesion_poli = zz2.fs_kd_sesion_poli 
                                                            LEFT JOIN  TA_REG_JAMINAN uu0 ON aa.FS_KD_REG =  uu0.fs_kd_reg 
                                                            LEFT JOIN  (   SELECT      DISTINCT ag1.fs_kd_polis, ag1.fs_mr, ag2.fs_kd_tipe_jaminan, ag2.fs_no_polis, 
                                                                                       ag2.fs_atas_nama, ag2.FS_KD_BU 
                                                                           FROM        TA_POLIS_COVER ag1 
                                                                           LEFT JOIN   TA_POLIS       ag2 ON ag1.fs_kd_polis = ag2.fs_kd_polis  
                                                                           WHERE       ag2.fd_expired = '3000-01-01' 
                                                                       ) ag ON aa.fs_kd_tipe_jaminan = ag.fs_kd_tipe_jaminan AND aa.fs_mr = ag.fs_mr AND uu0.fs_kd_polis = ag.fs_kd_polis 
                                                            LEFT JOIN  TA_BU xx ON ag.FS_KD_BU=xx.fs_kd_bu 
                                                            LEFT JOIN  ta_trs_bed bed ON aa.fs_kd_trs_bed_awal = bed.fs_kd_trs 
                                                            LEFT JOIN  (SELECT '1' fs_kd_dpp, 'Dokter Pilihan Pasien' fs_nm_dpp 
                                                                        UNION 
                                                                        SELECT '0' fs_kd_dpp, 'Dokter Pilihan RS' fs_nm_dpp) yy ON 
                                                                        aa.fb_dpp = yy.fs_kd_dpp 
                                                            LEFT JOIN  ta_kelas kk3 ON bed.fs_kd_kelas = kk3.fs_kd_kelas 
                                                            LEFT JOIN  ta_jenis_inap ji ON aa.fs_kd_jenis_inap = ji.fs_kd_jenis_inap 
                                                            LEFT JOIN ( SELECT xx.fs_kd_trs, xx.fs_kd_bed, xx.fs_kd_reg 
                                                                        FROM   (   SELECT fs_kd_trs, fs_kd_bed, fs_kd_reg, row_number() over(partition by fs_kd_reg order by fs_kd_trs) fn_row 
                                                                                   FROM ta_trs_bed WHERE FD_TGL_VOID ='3000-01-01') xx 
                                                                        WHERE fn_row =1 )bed2 on aa.fs_kd_reg = bed2.FS_KD_REG 
                                                            LEFT JOIN  ta_bed be ON bed2.fs_kd_bed = be.fs_kd_bed 
                                                            LEFT JOIN  ta_kamar ka ON be.fs_kd_kamar = ka.fs_kd_kamar 
                                                            LEFT JOIN  ta_bangsal ba ON ka.fs_kd_bangsal = ba.fs_kd_bangsal 
                                                            LEFT JOIN  (   select * from TZ_TRS_BUTTON_LOG 
                                                                           where FN_ID in (select MAX ( fn_id ) From TZ_TRS_BUTTON_LOG group by FS_KD_TRS_FORM) 
                                                                       ) af ON aa.fs_kd_reg = af.fs_kd_trs_form 
                                                            LEFT JOIN (
                                                                      SELECT   distinct x1.fs_jns_peserta, x2.fs_kd_reg, x1.fs_kelas_peserta, x1.FS_KD_MR 
                                                                      FROM     ta_trs_sep x1 
                                                                      LEFT JOIN ta_registrasi x2 ON x1.fs_kd_reg = x2.fs_kd_reg 
                                                                      WHERE x2.fd_tgl_void = '3000-01-01' 
                                                                      ) ae ON aa.fs_kd_reg = ae.fs_kd_reg and aa.fs_mr = ae.fs_kd_mr 
                                                            LEFT JOIN ta_suku sk on bb.fs_kd_suku = sk.fs_kd_suku 
                                                            LEFT JOIN ta_perusahaan pt on uu0.fs_kd_perusahaan = pt.fs_kd_perusahaan 
                                                            LEFT JOIN ta_negara_dk nd ON bb.fs_kd_negara=nd.fs_kd_negara 
                                                            LEFT JOIN ta_trs_booking bk on aa.FS_KD_BOOKING = bk.fs_kd_trs 
                                                            LEFT JOIN ta_cara_booking_dk bk2 on bk.fs_kd_cara_booking_dk = bk2.fs_kd_cara_booking_dk 
                                                            WHERE aa.fd_tgl_jam_masuk BETWEEN '$startDate' AND '$endDate'  AND aa.fs_kd_layanan IN('$layanan') AND  aa.fd_tgl_void = '3000-01-01'  ORDER BY gg.fs_nm_instalasi";

                                                            $query = sqlsrv_query($conn, $sql) or die(sqlsrv_errors());;
                                                        

                                                        while ($data = sqlsrv_fetch_array($query)) {

                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?php echo $data['fs_nm_pasien']; ?></td>
                                                                <td><?php echo $data['fs_kd_reg']; ?></td>
                                                                <td><?php echo $data['fd_tgl_masuk']; ?></td>
                                                                <td><?php echo $data['fs_nm_user']; ?></td>
                                                                <td><?php echo $data['fs_nm_layanan']; ?></td>
                                                                <td><?php echo $data['fs_nm_instalasi']; ?></td>
                                                                <td><?php echo $data['fs_nm_tipe_jaminan']; ?></td>
                                                                
                                                                <td><?php echo $data['fs_no_polis']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php } ?>