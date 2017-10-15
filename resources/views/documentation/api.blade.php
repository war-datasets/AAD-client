@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="page-header" style="margin-top: -20px;">
                            <h2 class="margin-page-header">API documentatie</h2>
                        </div>

                        <p>
                            We vinden het belangrijk en hechten er waarde aan dat de data omtrent slachtoffers.
                            Vrij toegankelijk is voor iedereen. Vandaar dat we een API hebben gebouwd voor het systeem.
                            Met deze api kunt u de data gebruiken als ontwikkelaar in uw eigen systemen. of bijdragen tot
                            accuratere data in dit platform.
                        </p>

                        <h3>Beschikbare API documentatie voor uw account.</h3>

                        <div class="row">
                            <div class="col-md-7">

                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>API omtrent de login's en gebruikers beheer. </td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-xs btn-info">
                                                    <span class="fa fa-fw fa-file-code-o"></span> Bekijk
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>API omtrent rechten en permissies in het systeem.</td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-xs btn-info">
                                                    <span class="fa fa-fw fa-file-code-o"></span> Bekijk
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>API omtrent de gesneuvelde in de Koreaanse oorlog. </td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-xs btn-info">
                                                    <span class="fa fa-fw fa-file-code-o"></span> Bekijk
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>API omtrent de gesneuvelde in de VietCong. </td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-xs btn-info">
                                                    <span class="fa fa-fw fa-file-code-o"></span> Bekijk
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection