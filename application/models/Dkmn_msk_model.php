<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dkmn_msk_model extends CI_Model
{
    // start datatables
    var $column_order = array(null, 'kode_dokumen', 'trx_dkmn_msk.nama_dokumen', 'nama_kategori', 'kode_lemari', 'file'); //set column field database for datatable orderable
    var $column_search = array('kode_dokumen', 'trx_dkmn_msk.nama_dokumen', 'nama_kategori', 'kode_lemari'); //set column field database for datatable searchable
    var $order = array('kode_dokumen' => 'asc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select('trx_dkmn_msk.*, kategori.nama_kategori, lemari.kode_lemari, user.name');
        $this->db->from('trx_dkmn_msk');
        $this->db->join('kategori', 'trx_dkmn_msk.id_kategori = kategori.id_kategori');
        $this->db->join('stts_dokumen', 'trx_dkmn_msk.id_stts = stts_dokumen.id_stts');
        $this->db->join('lemari', 'trx_dkmn_msk.id_lemari = lemari.id_lemari');
        $this->db->join('user', 'trx_dkmn_msk.user_id = user.user_id');
        $i = 0;
        foreach ($this->column_search as $dokumen) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($dokumen, $_POST['search']['value']);
                } else {
                    $this->db->or_like($dokumen, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('trx_dkmn_msk');
        return $this->db->count_all_results();
    }
    // end datatables

    public function get($id = null)
    {
        $this->db->from('trx_dkmn_msk');
        $this->db->join('tbl_ktgr_dokumen', 'tbl_ktgr_dokumen.id_kategori = trx_dkmn_msk.id_kategori');
        $this->db->join('lemari', 'lemari.id_lemari = trx_dkmn_msk.id_lemari');
        $this->db->join('tbl_bantex', 'tbl_bantex.id_bantex = trx_dkmn_msk.id_bantex');
        $this->db->join('stts_dokumen', 'trx_dkmn_msk.id_stts = stts_dokumen.id_stts');
        $this->db->join('user', 'user.user_id = trx_dkmn_msk.user_id');
        if ($id != null) {
            $this->db->where('id_dokumen', $id);
        }
        $this->db->order_by('kode_dokumen', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'tgl_dokumen' => $post['tgl_dokumen'],
            'kode_dokumen' => $post['kode_dok'],
            'nama_dokumen' => $post['nama_dok'],
            'asal_dokumen' => $post['asal_dokumen'],
            'user_id' => $post['pengupload'],
            'id_kategori' => $post['kategori'],
            'id_stts' => $post['stts_dokumen'],
            'id_lemari' => $post['lemari'],
            'id_bantex' => $post['bantex'],
            'file' => $post['file_dok'],
        ];
        $this->db->insert('trx_dkmn_msk', $params);
    }

    public function edit($post)
    {
        $params = [
            'tgl_dokumen' => $post['tgl_dokumen'],
            'kode_dokumen' => $post['kode_dok'],
            'nama_dokumen' => $post['nama_dok'],
            'asal_dokumen' => $post['asal_dokumen'],
            'user_id' => $post['pengupload'],
            'id_kategori' => $post['kategori'],
            'id_stts' => $post['stts_dokumen'],
            'id_lemari' => $post['lemari'],
            'id_bantex' => $post['bantex'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['file_dok'] != null) {
            $params['file'] = $post['file_dok'];
        }
        $this->db->where('id_dokumen', $post['id_dok']);
        $this->db->update('trx_dkmn_msk', $params);
    }

    function check_kode_dokumen($kode, $id = null)
    {
        $this->db->from('trx_dkmn_msk');
        $this->db->where('kode_dokumen', $kode);
        if ($id != null) {
            $this->db->where('id_dokumen !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_dokumen', $id);
        $this->db->delete('trx_dkmn_msk');
    }

    function update_dok_in($data)
    {
        $qty = $data['lem_suk'];
        $id = $data['id_dokumen'];
        $sql = "UPDATE trx_dkmn_msk SET jumlah_le = jumlah_le + '$qty' WHERE id_dokumen = '$id'";
        $this->db->query($sql);
    }

    function update_dok_out($data)
    {
        $qty = $data['lem_suk'];
        $id = $data['id_dokumen'];
        $sql = "UPDATE trx_dkmn_msk SET jumlah_le = jumlah_le - '$qty' WHERE id_dokumen = '$id'";
        $this->db->query($sql);
    }
}
