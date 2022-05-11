<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="day_mission">
    <div class="body">
        <div class="text-center">
            <font color="blue">
                <big><b>Nhiệm Vụ Ngày</b></big>
            </font>
            <br />
            <div class="form-group" id="non_query" style="background-color: #7ee2ff; border-color: #ad4105; padding: 20px;">
                <label for="partnerId">Số điện thoại:</label> <input type="text" class="form-control" name="partnerId" id="partnerId" aria-describedby="partnerId" placeholder="094xxxxxxx" />
                <small id="partnerId" class="form-text text-muted">Nhập số điện thoại của bạn để kiểm tra và nhận thưởng.</small> <br />
                <button class="btn btn-success check-day-mission" onclick="DUNGA.check_dayMission()">Kiểm Tra</button>
                <p>Tổng tiền Nhiệm Vụ Ngày đã trao: <b id="total_reward" style="color: blue;">{{ number_format($total) }}</b> <font style="color: blue;">VNĐ</font></p>
            </div>
            <div class="form-group" id="query_done" style="display: none;"></div>
            <div class="form-group bg-warning" id="day_mission_querying" style="display: none;">Đang truy vấn... xin chờ nhé...</div>
        </div>
        <div class="day_mission" style="background-color: #7ee2ff; border-color: #ad4105; padding: 20px;">
            - Thật tuyệt vời ! Mỗi ngày chỉ cần chơi trên <b class="text-success">{{ $setting->name }}</b> chắc chắn bạn sẽ nhận được tiền. <br />
            - Khi chơi đủ số tiền (ko cần biết thắng thua) chắc chắn sẽ nhận được tiền. <br />
            - Hãy nhập số điện thoại của bạn vào mục bên trên để kiểm tra đã chơi bao nhiêu nhé. Chú ý : Phải nhập sdt là số cũ vd: 082xxx -> 0129xxx , 03xxx -> 016... <br />
            - Khi chơi đủ mốc tiền, các bạn ấn vào nhận thưởng để nhận được các mốc như sau:
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead>
                        <tr role="row" class="bg-primary">
                            <th class="text-center text-white">Mốc chơi</th>
                            <th class="text-center text-white">Thưởng</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_day_mission">
                        @foreach ($day_mission['data'] as $row)
                        <tr>
                            <td>{{ number_format($row['level']) }}</td>
                            <td>{{ number_format($row['gift']) }} đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
