@extends('user.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <!--END TITLE & BREADCRUMB PAGE-->
@endsection

@section('content')

    <!-- Containers
    ================================================== -->

    <section class="section section-inverse point">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 subtitle">
                    <h2>あなたの旅です</h2>
                    <p>写真をクリックすると情報を変更できます。</p>
                </div>
                <div class="col-lg-8">
                    <div class="bs-component">
                        <form class="form-horizontal">
                            <fieldset>
                                <legend>検索フォーム</legend>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">旅名</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="検索したい旅名を入力してください">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Checkbox
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label">Textarea</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="3" id="textArea"></textarea>
                                        <span class="help-block">ヘルプテキストは長くすることで1行を超えて分割されるようになります。</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Radios</label>
                                    <div class="col-lg-10">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                こっち
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                あっち
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select" class="col-lg-2 control-label">Selects</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <br>
                                        <select multiple="" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">キャンセル</button>
                                        <button type="submit" class="btn btn-primary">送信</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection