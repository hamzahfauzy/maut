@extends('adminlte::page')

@section('title', 'Hasil')

@section('content_header')
    Hasil
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Hasil') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        @foreach($criterias as $criteria)
                                        <th>{{$criteria->name}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($alternatifs as $i => $alternatif)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $alternatif->name }}</td>
                                            @foreach($criterias as $key => $value)
                                            <td>{{$alternatif->valuations[$key]->subcriteria->name}}</td>
                                            @endforeach
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bobot') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        @php($max=[])
                                        @php($min=[])
                                        @foreach($criterias as $k => $criteria)
                                        @php($max[$k]=0)
                                        @php($min[$k]=1000)
                                        <th>{{$criteria->name}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($alternatifs as $i => $alternatif)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                            <td>{{ $alternatif->name }}</td>
                                            @foreach($criterias as $key => $value)
                                            @php($nilai=number_format($alternatif->valuations[$key]->subcriteria->weighted*$alternatif->valuations[$key]->criteria->weighted/100,2))
                                            @php($max[$key]=$max[$key]<$nilai?$nilai:$max[$key])
                                            @php($min[$key]=$min[$key]>$nilai?$nilai:$min[$key])
                                            <td>{{$nilai}}</td>
                                            @endforeach
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Normalisasi') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        @foreach($criterias as $criteria)
                                        <th>{{$criteria->name}}</th>
                                        @endforeach
                                        <th>Total</th>
                                        <th>Rata-Rata</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($total=[])
                                    @php($rata=[])
                                    @forelse ($alternatifs as $i => $alternatif)
                                        @php($total[$alternatif->id]=0)
                                        @php($rata[$alternatif->id]=['alternatif'=>$alternatif,'nilai'=>0])
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $alternatif->name }}</td>
                                            @foreach($criterias as $key => $value)
                                            @php($nilai=number_format($alternatif->valuations[$key]->subcriteria->weighted*$alternatif->valuations[$key]->criteria->weighted/100,2))
                                            @php($normalisasi=($nilai-$min[$key])/($max[$key]-$min[$key]))
                                            @php($normalisasi=number_format($normalisasi,2))
                                            @php($total[$alternatif->id]+=$normalisasi)
                                            <td>{{$normalisasi}}</td>
                                            @endforeach
                                            @php($rata[$alternatif->id]['nilai']=$total[$alternatif->id]/count($criterias))
                                            <td>{{$total[$alternatif->id]}}</td>
                                            <td>{{$rata[$alternatif->id]['nilai']}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @php(usort($rata,function($a, $b){
                                return $a['nilai'] < $b['nilai'];
                            }))
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Rangking') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Rangking</th>
                                        <th>Alternatif</th>
                                        <th>Rata-Rata</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rata as $i => $alternatif)
                                        
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $alternatif['alternatif']->name }}</td>
                                            <td>{{ $alternatif['nilai'] }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
