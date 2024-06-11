                <div class="panel-group" id="navMenu" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#navMenu" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Main Section
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="link" data-url="/cognition/doc/eti">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                    <span>Home</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#navMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    ETI Documents
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                @auth
                                <div class="link" data-url="/cognition/doc/eti/new">
                                    <span class="glyphicon glyphicon-pencil" style="padding-right: 10px;"></span>
                                    <span>Create New</span>
                                </div>
                                @endauth
                                <div class="link" data-url="/cognition/doc/eti/browse">
                                    <span class="glyphicon glyphicon-list" style="padding-right: 10px;"></span>
                                    <span>Browse</span>
                                </div>
                                <div class="link" data-url="/cognition/doc/eti/search">
                                    <span class="glyphicon glyphicon-search" style="padding-right: 10px;"></span>
                                    <span>Search</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#navMenu" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    CI Documents
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                @auth
                                <div class="link">
                                    <span class="glyphicon glyphicon-pencil" style="padding-right: 10px;"></span>
                                    <span>Create New</span>
                                </div>
                                @endauth
                                <div class="link">
                                    <span class="glyphicon glyphicon-list" style="padding-right: 10px;"></span>
                                    <span>Browse</span>
                                </div>
                                <div class="link">
                                    <span class="glyphicon glyphicon-search" style="padding-right: 10px;"></span>
                                    <span>Search</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#navMenu" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Settings
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                Stuff
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title" style="font-size: 10pt;">
                            User Info
                        </h5>
                    </div>
                    <div class="panel-body" style="font-size: 10pt;">
                        @auth
                            {{ Auth::user()->email }}
                            <br><br>
                            <button class="btn btn-sm btn-primary link" data-url="/auth/logout">Logout</button>
                        @endauth
                        @guest
                            <button class="btn btn-sm btn-primary link" data-url="/login">Login</button>
                        @endguest

                    </div>
                </div>