<div class="site-about">
  <table class="table table-responsive">
    <thead>
      <th>ID</th>
      <th>Actions</th>
      <th>Title</th>
      <th>Publication date</th>
      <th>Upload date</th>
      <th>Comments</th>
    </thead>
    <tbody>
    <?php
      foreach($xml->xpath('//item') as $item){
        echo "<tr>
                <td></td>
                <td></td>
                <td>".$item->title."</td>
                <td>".$item->pubDate."</td>
                <td></td>
                <td></td>
              </tr>";
      }
    ?>
    </tbody>
  </table>   
</div>
