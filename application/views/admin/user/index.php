<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
    <section class="content-header">
        <?= $pagetitle; ?>
        <?= $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="row" id="pwd-container">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">User</h3>
                    </div>
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:2%">No</th>
                                    <th style="width:13%">IP Address</th>
                                    <th style="width:15%">Username</th>
                                    <th style="width:30%">Nama Lengkap</th>
                                    <th style="width:10%">Email</th>
                                    <th style="width:10%">No HP</th>
                                    <th style="width:10%">Dibuat</th>
                                    <th style="width:10%">Terakhir Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($users_all->result() as $data_user): ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $i;
                                        ?>
                                    </td>
                                    <td><?= $data_user->ip_address; ?></td>
                                    <td><?= $data_user->username; ?></td>
                                    <td><?= $data_user->first_name .' '. $data_user->last_name; ?></td>
                                    <td><?= $data_user->email; ?></td>
                                    <td><?= $data_user->phone; ?></td>
                                    <td><?= date('j F Y',$data_user->created_on); ?></td>
                                    <td>
                                        <?php
                                        if($data_user->last_login != NULL)
                                        {
                                            echo gmdate('j F Y p\uk\u\l H:i', strtotime('+7 hours', $data_user->last_login));
                                        }
                                        else
                                        {
                                            echo $data_user->last_login;
                                        }
                                        $i++;
                                        ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>