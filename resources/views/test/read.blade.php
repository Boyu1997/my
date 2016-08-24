<!doctype html>
<html>

    <head>
        <title>
            @yield('title','艾美康办公系统')
        </title>

        <meta charset='utf-8'>

        <link href="/css/libraries/bootstrap.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/libraries/chartist.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/layouts/master.css" type='text/css' rel='stylesheet'>
        <link href="/css/libraries/theme.metro-dark.min.css" type='text/css' rel='stylesheet'>
        @yield('head')

    </head>

    <body>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <h1 class="page-header">测试数据</h1>
                @if(sizeof($datas))
                    <table id="monthly_table" class="tablesorter">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>创建时间</th>
                                <th>种类</th>
                                <th>停机保护</th>
                                <th>温度1</th>
                                <th>湿度1</th>
                                <th>温度2</th>
                                <th>湿度2</th>
                                <th>压缩机</th>
                                <th>换风</th>
                                <th>风机</th>
                                <th>加热1</th>
                                <th>加热2</th>
                                <th>加湿器</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->type }}</td>
                                    @if($data->critical_error > 0) <td style="background-color: red;">是</td>
                                    @else <td>否</td>
                                    @endif
                                    <td>{{ $data->temperature_1 }}℃</td>
                                    <td>{{ $data->humidity_1 }}%</td>
                                    <td>{{ $data->temperature_2 }}℃</td>
                                    <td>{{ $data->humidity_2 }}%</td>
                                    @if($data->compressor_1 == 0) <td>关闭</td>
                                    @elseif($data->compressor_1 == 1) <td style="background-color: green;">运行</td>
                                    @elseif($data->compressor_1 == 2 || $data->compressor_1 == 4) <td style="background-color: red;">故障</td>
                                    @elseif($data->compressor_1 == 3) <td style="background-color: yellow;">预运行</td>
                                    @endif
                                    @if($data->exchanger_1 == 0) <td>关闭</td>
                                    @elseif($data->exchanger_1 == 1) <td style="background-color: green;">运行</td>
                                    @elseif($data->exchanger_1 == 2) <td style="background-color: red;">故障</td>
                                    @elseif($data->exchanger_1 == 3) <td style="background-color: yellow;">预运行</td>
                                    @endif
                                    @if($data->fan_1 == 0) <td>关闭</td>
                                    @elseif($data->fan_1 == 1) <td style="background-color: green;">运行</td>
                                    @elseif($data->fan_1 == 2) <td style="background-color: red;">故障</td>
                                    @elseif($data->fan_1 == 3) <td style="background-color: yellow;">预运行</td>
                                    @endif
                                    @if($data->heater_1 == 0) <td>关闭</td>
                                    @elseif($data->heater_1 == 1) <td style="background-color: green;">运行</td>
                                    @elseif($data->heater_1 == 2) <td style="background-color: red;">故障</td>
                                    @elseif($data->heater_1 == 3) <td style="background-color: yellow;">预运行</td>
                                    @endif
                                    @if($data->heater_2 == 0) <td>关闭</td>
                                    @elseif($data->heater_2 == 1) <td style="background-color: green;">运行</td>
                                    @elseif($data->heater_2 == 2) <td style="background-color: red;">故障</td>
                                    @elseif($data->heater_2 == 3) <td style="background-color: yellow;">预运行</td>
                                    @endif
                                    @if($data->humidifier == 0) <td>关闭</td>
                                    @elseif($data->humidifier == 1) <td style="background-color: green;">运行</td>
                                    @elseif($data->humidifier == 2) <td style="background-color: red;">故障</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>抱歉...</h3>
                            <p4>没有找到任何数据，请稍后刷新再试。</p4>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-2">
            </div>
        </div>


        <script src="/js/libraries/jquery.min.js"> </script>
        <script src="/js/libraries/bootstrap.min.js"> </script>
        <script src="/js/libraries/chartist.min.js"> </script>
        <script src="/js/libraries/jquery-ui.min.js"> </script>
        <script src="/js/libraries/jquery.tablesorter.min.js"> </script>
        <script src="/js/libraries/jquery.tablesorter.widgets.min.js"> </script>
        <script>
            $("div.alert").delay(3000).slideUp();
        </script>
        <script>
            $(document).ready(function () {
                $("table.sortable").addClass("tablesorter");
                $('table.tablesorter').tablesorter({
                    'theme': 'metro-dark',
                    'widgets':['zebra'],
                    'sortList' : [[0,1]]
                });
            });
        </script>
        @yield('body')

    </body>

    </html>
