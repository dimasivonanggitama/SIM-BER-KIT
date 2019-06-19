<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Micro_spv extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_penempatan_m');
        $this->load->model('ap_admin_m');
        $this->load->model('ap_hanggar_group_m');
        $this->load->model('ap_hanggar_group_dtl_m');
        $this->load->model('ap_perusahaan_m');
        $this->load->model('ap_micro_m');
        $this->load->model('ap_micro_dtl_m');
    }

    public function index($smt = NULL, $tahun = NULL)
    {        
        ob_start();
        if($smt == NULL && $tahun == NULL){
            $tahun=intval(date('M'));
            if (intval(date('m')) >= 7 && intval(date('m')) <= 12){
                $smt=1;
                $tahun=intval(date('Y'));
            }elseif(intval(date('m')) >= 1 && intval(date('m')) <= 6){
                $smt=2;
                $tahun=intval(date('Y'))-1;
            }
        }
        $this->data['thissmt']=$smt;
        $this->data['periode'] = array(semester($smt),$tahun);

        $sql="SELECT P.id_micro, P.tgl_pengajuan as tgl_pengajuan,P.id_penempatan as id_penempatan, P.tahun as tahun, P.semester as semester, P.id_admin as id_admin, P.flag_pengajuan as flag_pengajuan, A.uraian_penempatan as uraian_penempatan FROM `ap_micro` P LEFT JOIN ap_penempatan A ON A.id_penempatan = P.id_penempatan WHERE P.semester='".$smt."' AND P.tahun='".$tahun."' ORDER BY P.id_micro DESC";
        $this->data['contentspv'] = $this->db->query($sql)->result();

        $sql2="SELECT DISTINCT P.id_penempatan, P.uraian_penempatan from `ap_penempatan` P
        LEFT JOIN ap_hanggar_group A ON A.id_penempatan = P.id_penempatan 
        LEFT JOIN ap_perusahaan B ON B.id_perusahaan = A.id_perusahaan
        WHERE B.id_perusahaan_kategori = 5 AND B.status_perusahaan='Aktif'";
        $this->data['dt_hanggar'] = $this->db->query($sql2)->result();
        //echo '<script type="text/javascript">alert("' . $juml_status[0]->total. '")</script>';
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
        ob_end_flush();
    }

    public function search(){
        $semester=$this->input->post('semester');
        $tahun=$this->input->post('tahun');

        $datajson['semester'] = $semester;
        $datajson['tahun']   = $tahun;

        echo json_encode($datajson);
    }

    public function unduh_excel($semester,$tahun){
        // $semester=$this->input->post('semester');
        // $tahun=$this->input->post('tahun');

        $sql2 = "SELECT P.id_micro_dtl, C.semester, C.tahun ,P.jml_tenaga_kerja, P.n_investasi, P.n_penangguhan, P.n_ekspor, P.n_jual_lokal, B.id_perusahaan ,B.nama_perusahaan , B.skep_penetapan_perusahaan, B.tgl_skep_penetapan_perusahaan, B.hasil_produksi_perusahaan FROM `ap_perusahaan` B LEFT JOIN ap_micro_dtl P ON P.id_perusahaan = B.id_perusahaan LEFT JOIN ap_micro C ON C.id_micro = P.id_micro WHERE C.semester=? AND C.tahun=? AND C.flag_pengajuan=1 AND B.id_perusahaan_kategori = 5 AND B.status_perusahaan='Aktif'";
        $micro = $this->db->query($sql2,array($semester,$tahun))->result();

        if($micro != NULL){

                // $sql="SELECT P.id_micro, P.id_penempatan as id_penempatan, P.tahun as tahun, P.semester as semester, P.id_admin as id_admin, P.flag_pengajuan as flag_pengajuan, A.uraian_penempatan as uraian_penempatan FROM `ap_micro` P LEFT JOIN ap_penempatan A ON A.id_penempatan = P.id_penempatan WHERE P.id_micro='".$id."' ORDER BY P.id_micro DESC";
                // $datahanggar = $this->db->query($sql)->result();

                $no = 1; // Untuk penomoran tabel, di awal set dengan 1    
                $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4


                $spreadsheet = new Spreadsheet();
                $spreadsheet->getProperties()
                ->setCreator('Noorman Subekti')
                ->setLastModifiedBy('')
                ->setTitle('')
                ->setSubject('')
                ->setDescription('')
                ->setKeywords('')
                ->setCategory('');

                $style_col = array(
                    'font' => array('bold' => true), // Set font nya jadi bold      
                    'alignment' => array(        
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)        
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)      
                    ),
                );

                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            //'color' => ['argb' => 'FFFF0000'],
                        ]
                    ],
                    'font' => [
                        'bold' => true
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)        
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)      
                    ]
                ];

                $styleRow = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            
                        ]
                    ],
                    'alignment' => [        
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)      
                    ]
                ];
                
                // NEW WORKSHEET
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setTitle('Laporan Micro');

                $sheet->setCellValue('A1', "LAPORAN EVALUASI MICRO PKB/PDKB - KPPBC TMP B SIDOARJO")
                        ->mergeCells('A1:J1');
                $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); // Set font size 15 untuk kolom A1
                $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
                $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER); // Set text center untuk kolom A1

                $sheet->setCellValue('A2', "SEMESTER ".$micro[0]->semester." TAHUN ".$micro[0]->tahun)
                        ->mergeCells('A2:J2');
                $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
                $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
                $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
                $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER); // Set text center untuk kolom A1

                $sheet->setCellValue('A3', "NO")
                        ->setCellValue('B3', "NAMA PERUSAHAAN")
                        ->setCellValue('C3', "SKEP PKB/PDKB")
                        ->setCellValue('D3', "TGL SKEP PKB/PDKB")
                        ->setCellValue('E3', "BIIDANG USAHA/HASIL PRODUKSI")
                        ->setCellValue('F3', "JUMLAH TENAGA KERJA (ORANG)")
                        ->setCellValue('G3', "NILAI INVESTASI(Rp)")
                        ->setCellValue('H3', "NILAI PENANGGUHAN(Rp)")
                        ->setCellValue('I3', "NILAI EKSPOR(USD)")
                        ->setCellValue('J3', "NILAI JUAL LOKAL(Rp)");
                        //set format
                // $spreadsheet->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
                // $spreadsheet->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);

                $sheet->getStyle('A3:J3')->applyFromArray($styleArray);
                $total1 = 0; $total2 = 0; $total3 = 0; $total4 = 0; $total5 = 0;
                foreach($micro as $data){
                    $sheet->setCellValue('A'.$numrow, $no)
                            ->setCellValue('B'.$numrow, $data->nama_perusahaan)
                            ->setCellValue('C'.$numrow, $data->skep_penetapan_perusahaan)
                            ->setCellValue('D'.$numrow, $data->tgl_skep_penetapan_perusahaan)
                            ->setCellValue('E'.$numrow, $data->hasil_produksi_perusahaan)
                            ->setCellValue('F'.$numrow, $data->jml_tenaga_kerja)
                            ->setCellValue('G'.$numrow, $data->n_investasi)
                            ->setCellValue('H'.$numrow, $data->n_penangguhan)
                            ->setCellValue('I'.$numrow, $data->n_ekspor)
                            ->setCellValue('J'.$numrow, $data->n_jual_lokal);

                    $spreadsheet->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('i'.$numrow)->applyFromArray($styleRow);
                    $spreadsheet->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($styleRow);

                    $spreadsheet->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $spreadsheet->getActiveSheet()->getStyle('C'.$numrow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$numrow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    $spreadsheet->getActiveSheet()->getStyle('F'.$numrow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0');
                    $spreadsheet->getActiveSheet()->getStyle('G'.$numrow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0.00');
                    $spreadsheet->getActiveSheet()->getStyle('H'.$numrow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0.00');
                    $spreadsheet->getActiveSheet()->getStyle('I'.$numrow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0.00');
                    $spreadsheet->getActiveSheet()->getStyle('J'.$numrow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0.00');

                    $total1 = $total1+$data->jml_tenaga_kerja;
                    $total2 = $total2+$data->n_investasi;
                    $total3 = $total3+$data->n_penangguhan;
                    $total4 = $total4+$data->n_ekspor;
                    $total5 = $total5+$data->n_jual_lokal;

                    $no++;
                    $numrow++;
                }

                $highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
                $highestRow=$highestRow+1;
                $sheet->setCellValue('A'.$highestRow, "JUMLAH")->mergeCells('A'.$highestRow.':E'.$highestRow);

                $spreadsheet->getActiveSheet()->getStyle('A'.$highestRow)->getFont()->setBold(true);
                $spreadsheet->getActiveSheet()->getStyle('A'.$highestRow)->getFont()->setSize(12); // Set font size 15 untuk kolom A1
                $spreadsheet->getActiveSheet()->getStyle('A'.$highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
                $spreadsheet->getActiveSheet()->getStyle('A'.$highestRow.':E'.$highestRow)->applyFromArray($styleRow);

                $sheet->setCellValue('F'.$highestRow, $total1);
                $spreadsheet->getActiveSheet()->getStyle('F'.$highestRow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0');
                $spreadsheet->getActiveSheet()->getStyle('F'.$highestRow)->applyFromArray($styleRow);
                $spreadsheet->getActiveSheet()->getStyle('F'.$highestRow)->getFont()->setBold(true);
                $sheet->setCellValue('G'.$highestRow, $total2);
                $spreadsheet->getActiveSheet()->getStyle('G'.$highestRow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0.00');
                $spreadsheet->getActiveSheet()->getStyle('G'.$highestRow)->applyFromArray($styleRow);
                $spreadsheet->getActiveSheet()->getStyle('G'.$highestRow)->getFont()->setBold(true);
                $sheet->setCellValue('H'.$highestRow, $total3);
                $spreadsheet->getActiveSheet()->getStyle('H'.$highestRow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0.00');
                $spreadsheet->getActiveSheet()->getStyle('H'.$highestRow)->applyFromArray($styleRow);
                $spreadsheet->getActiveSheet()->getStyle('H'.$highestRow)->getFont()->setBold(true);
                $sheet->setCellValue('I'.$highestRow, $total4);
                $spreadsheet->getActiveSheet()->getStyle('I'.$highestRow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0.00');
                $spreadsheet->getActiveSheet()->getStyle('I'.$highestRow)->applyFromArray($styleRow);
                $spreadsheet->getActiveSheet()->getStyle('I'.$highestRow)->getFont()->setBold(true);
                $sheet->setCellValue('J'.$highestRow, $total5);
                $spreadsheet->getActiveSheet()->getStyle('J'.$highestRow)->getNumberFormat()->setFormatCode('###,###,###,###,###,###,##0.00');
                $spreadsheet->getActiveSheet()->getStyle('J'.$highestRow)->applyFromArray($styleRow);
                $spreadsheet->getActiveSheet()->getStyle('J'.$highestRow)->getFont()->setBold(true);

                foreach ($spreadsheet->getActiveSheet()->getRowIterator() as $row) {
                    if ($spreadsheet->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible()) {
                        if($row->getRowIndex() != 1 || $row->getRowIndex() != 2){
                            $spreadsheet->getActiveSheet()->getRowDimension($row->getRowIndex())->setRowHeight(24);
                        }
                    }
                }
                $spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(26);

                $col = 'A';
                while(true){
                    $tempCol = $col++;
                    $spreadsheet->getActiveSheet()->getColumnDimension($tempCol)->setAutoSize(true);
                    if($tempCol == $spreadsheet->getActiveSheet()->getHighestDataColumn()){
                        break;
                    }
                }
                // OUTPUT
            $ini=NULL;
            if($semester == 1){
                $ini="I";
            }elseif($semester == 2){
                $ini="II";
            }
            $filename = "Laporan Micro KPPBC TMP B Sidoarjo Semester ".$ini.' Tahun '.$tahun.' - Create-'.date("d-m-Y").' Jam '.date("H:i:s");
            $extension = 'Xlsx';
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, $extension);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment; filename=\"{$filename}.{$extension}\"");
            $writer->save('php://output');
        }else{
            echo "<script>alert('Data Tidak Ditemukan');window.close();</script>";
            //$datajson['nihil'] = '1';
        }  
    }

}

