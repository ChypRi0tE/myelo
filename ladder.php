<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Team</th>
        <th>Played</th>
        <th>Win</th>
        <th>Lose</th>
        <th>Rating</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $n = 1;
    $manager = new TeamManager($bdd);
    $teams = $manager->getAll();
    if (!empty($teams)) {
        foreach($teams as $team) { ?>
        <tr>
            <td><?php echo $n; ?></td>
            <td><?php echo $team->getName(); ?></td>
            <td><?php echo $team->getPlayed(); ?></td>
            <td><?php echo $team->getWins(); ?></td>
            <td><?php echo $team->getLosses(); ?></td>
            <td><?php echo $team->getRating(); ?></td>
        </tr>
    <?php $n++; }} ?>
    </tbody>
</table>