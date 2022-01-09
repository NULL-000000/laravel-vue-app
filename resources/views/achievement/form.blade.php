<div class="mt-3 pt-3">
    <h3 class="h3 card-title">
        @if ($achievement == 'success')
        <div class="text-dark">
            達成！
        </div>
        @elseif ($achievement == 'failure')
        <div class="text-dark">
            失敗。。。
        </div>
        @endif
    </h3>

    @csrf
    @if ($achievement == 'success')
    <div class="card-body pt-0">
        <div class="form-group">
            <label>学び・気づき</label>
            <input type="text" name="study" class="form-control" value="">
        </div>
        <div class="form-group">
            <label>次回の意気込み</label>
            <input type="text" name="enthusiasm" class="form-control" value="">
        </div>
        <input type="hidden" name="achievement" value="success">
    </div>
    @elseif ($achievement == 'failure')
    <div class="card-body pt-0">
        @csrf
        <div class="form-group">
            <label>失敗した原因</label>
            <input type="text" name="cause" class="form-control" value="">
        </div>
        <div class="form-group">
            <label>次回の対策</label>
            <input type="text" name="solution" class="form-control" value="">
        </div>
        <input type="hidden" name="achievement" value="failure">
    </div>
    @endif
</div>
