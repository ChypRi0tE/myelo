                    <div class="row">
                        <div class="form-group">
                            <label for="inputTeamA" class="col-md-2 control-label">Equipe A</label>
                            <div class="col-md-4">
                                <select name="inputTeamA" class="form-control notActive" id="selectTeamA">
                                    <?php foreach($teams as $team) { ?>
                                        <option value="<?php echo $team->getId(); ?>">
                                            <?php echo $team->getName(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group">
                            <label for="inputTeamB" class="col-md-2 control-label">Equipe B</label>
                            <div class="col-md-4">
                                <select name="inputTeamB" class="form-control notActive" id="selectTeamB">
                                    <?php foreach($teams as $team) { ?>
                                        <option value="<?php echo $team->getId(); ?>">
                                            <?php echo $team->getName(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group">
                            <label for="result" class="col-sm-2 col-md-2 control-label">Vainqueur</label>
                            <div class="col-sm-8 col-md-8">
                                <div class="input-group">
                                    <div id="radioBtn" class="btn-group">
                                        <a class="btn btn-primary btn-sm active" data-toggle="inputResult" data-title="1" id="labelTeamA">Equipe A</a>
                                        <a class="btn btn-primary btn-sm notActive" data-toggle="inputResult" data-title="2" id="labelTeamB">Equipe B</a>
                                    </div>
                                    <input type="hidden" name="inputResult" id="inputResult" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group" id="datepick">
                            <label for="inputTeamB" class="col-md-2 control-label">Joué le</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control notActive" name="inputDate" />
                            </div>
                        </div>
                    </div>