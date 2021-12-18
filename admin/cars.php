<?php include 'header.php'; ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Cars List <a class="btn btn-info" href="createcar.php">Create Car</a></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Cars</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                              
                                    <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Price/Hour</th>
                                            <th>Included Price</th>
                                            <th>Version</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Price/Hour</th>
                                            <th>Included Price</th>
                                            <th>Version</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
 
                                     
                               
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div style="height: 100vh"></div>
                        <div class="card mb-4"><div class="card-body"></div></div>
                    </div>
                </main>
             <?php include 'footer.php'; ?>