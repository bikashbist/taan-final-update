@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')


    <section class="about-us gallery-page ">
        <div class="section-bg-banner">
            <div class="hero-bg">
                <img src="{{asset('assets/site/images/layout-img/page-title.webp')}}"  alt="bg">
            </div>
            <div class="container">
                <div class="section-hero-title">
                    <p class="text-white"> Welcome to!</p>
                    <h1 class="text-white">Trekking Permit fees</h1>


                </div>
                <img class="page-title-icon" src="{{asset('assets/site/images/layout-img/icon-page-title.png')}}" alt="icon">
            </div>
        </div>
        <div class="container pt-lg-5 pt-4">
            <div class="row">
                <div class="col-sm-12">

                    <p><strong>Trekking Permit</strong><br>
                        The Department of Immigration located at Kalikasthan,&nbsp;<span
                            style="background-color:#4da42f); color:rgb(61, 61, 61); font-family:arial,helvetica,sans-serif">Dillibazar,
                            Kathmandu</span>&nbsp;(<span
                            style="background-color:#4da42f); color:rgb(61, 61, 61); font-family:arial,helvetica,sans-serif">Tel
                            : 977 – 1 – 4429659 / 4429660 / 4438862 / 4438868&nbsp;</span><span
                            style="background-color:#4da42f); color:rgb(61, 61, 61); font-family:arial,helvetica,sans-serif">Fax
                            : 977 – 1 – 4433934 /4433935&nbsp;</span><span
                            style="background-color:#4da42f); color:rgb(61, 61, 61); font-family:arial,helvetica,sans-serif">Email
                            :&nbsp;</span><a href="mailto:mail@nepalimmigration.gov.np"
                            style="margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; text-decoration: none; color: rgb(230, 99, 77); line-height: normal; background-color: #4da42f);">mail@nepalimmigration.gov.np</a>&nbsp;<span
                            style="background-color:#4da42f); color:rgb(61, 61, 61); font-family:arial,helvetica,sans-serif">Web
                            :&nbsp;</span><a href="http://www.nepalimmigration.gov.np/"
                            style="margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; text-decoration: none; color: rgb(230, 99, 77); line-height: normal; background-color: #4da42f);">http://www.nepalimmigration.gov.np</a>)
                        issues permit for foreign tourists who intend to trek in controlled areas of Nepal.</p>

                    <p>A trekking permit is a must to travel to controlled areas mentioned below. Permit, however, is issued
                        only to groups. Individual trekkers will not be issued trekking permit.</p>

                    <p>The areas and required fees are as follows:</p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color:#4da42f; text-align:left" class="text-white">S.No.</th>
                                <th style="background-color:#4da42f; text-align:left" class="text-white">Regions/VDCs</th>
                                <th style="background-color:#4da42f; text-align:left" class="text-white">Permit Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td><strong>Upper Mustang&nbsp; (Province No. 4)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Lomanthang Rural Municipality (All areas of ward no. 1 to 5)</li>
                                        <li>Lo-Ghekar Damodarkunda Rural Municipality (All areas of ward no. 1 to 5)</li>
                                        <li>Baragung Muktichetra Rural Municipality (All areas of ward no. 3 and Satang
                                            Village of ward no.5)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 500 per person (for the first 10 days)</p>

                                    <p>USD 50 per person /Day ( beyond 10 days)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>2.</p>
                                </td>
                                <td><strong>Upper Dolpa&nbsp; (Province No. 6)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Dolpo Buddha Rural Municipality (All areas of ward no. 4 to 6)</li>
                                        <li>Shey Phoksundo Rural Municipality (All areas of ward no. 1 to 7)</li>
                                        <li>Charka Tangsong Rural Municipality (All areas of ward no. 1 to 6)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 500 per person (for the first 10 days)</p>

                                    <p>USD 50 per person /Day ( beyond 10 days)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>3.</p>
                                </td>
                                <td><strong>Gorkha Manaslu Area (Province No. 4)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Chumnubri Rural Municipality (All areas of ward nos. 1,2,3 and 4)</li>
                                    </ol>
                                </td>
                                <td><strong>September – November</strong>
                                    <p>USD 100 per person / week</p>

                                    <p>USD 15 per person / day (beyond 1 week)</p>
                                    <strong>December – August</strong>

                                    <p>USD 75 per person / week</p>

                                    <p>USD 10 per person / day (beyond 1 week)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td><strong>Humla (Province No. 6)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Simikot Rural Municipality (All areas of ward nos. 1,6 and 7)</li>
                                        <li>Namkha Rural Municipality (All areas of ward no. 1 to 6)</li>
                                        <li>Changkheli Rural Municipality (All areas of ward no. 3 to 5)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 50 per person / week</p>

                                    <p>USD 10 per person / day (beyond 1 week)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td><strong>Taplejung (Province No. 1)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Phantanglung Rural Municipality (All areas of ward nos. 6 and 7)</li>
                                        <li>Mikwakhola Rural Municipality (All areas of ward no. 5)</li>
                                        <li>Sirijunga Rural Municipality (All areas of ward no. 8)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 20 per person/ week (for the first 4 weeks)</p>

                                    <p>USD 25 per person /week ( beyond 4 weeks)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td><strong>Lower Dolpa Area (Province No. 6)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Thulibheri municipality (All areas of ward no. 1 to 11)</li>
                                        <li>Tripurasundari municipality (All areas of ward no. 1 to 11)</li>
                                        <li>Dolpo Buddha Rural Municipality (All areas of ward no. 1 to 3)</li>
                                        <li>Shey Phoksundo Rural Municipality (All areas of ward no. 8 and 9)</li>
                                        <li>Jagdulla Rural Municipality (All areas of ward no. 1 to 6)</li>
                                        <li>Mudkechula Rural Municipality (All areas of ward no. 1 to 9)</li>
                                        <li>Kaike Rural Municipality (All areas of ward no. 1 to 7)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 20 per person/ week&nbsp;</p>

                                    <p>USD 5 per person /week ( beyond 1 week)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td><strong>Dolakha&nbsp; &nbsp;(Province No. 3)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Gaurishankhar Rural Municipality (All areas of ward no. 9)</li>
                                        <li>Bighu Rural Municipality (All areas of ward no. 1)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 20 per person/ week&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td><strong>Gorkha Tsum Valley Area (Province No. 4)</strong>
                                    <p>Sirdibas-Lokpa-Chumling-Chekampar-Nile-Chule</p>

                                    <ol style="list-style-type:lower-alpha">
                                        <li>Chumnubri Rural Municipality (All areas of ward nos. 3,6 and 7)</li>
                                    </ol>
                                </td>
                                <td><strong>September – November</strong>
                                    <p>USD 40 per person / week</p>

                                    <p>USD 7 per person / day (beyond 1 week)</p>
                                    <strong>December – August</strong>

                                    <p>USD 30 per person / week</p>

                                    <p>USD 7 per person / day (beyond 1 week)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td><strong>Sankhuwasabha (Province 1)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Bhotkhola Rural Municipality (All areas of ward no. 1 to 5)</li>
                                        <li>Makalu Rural Municipality (All areas of ward no. 4)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 20 per person/ week (for the first 4 weeks)</p>

                                    <p>USD 25 per person /week ( beyond 4 weeks)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>10.</td>
                                <td><strong>Solukhumbu (Province No. 1)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Khumbu Pasang Lahmu Rural Municipality (All areas of ward no. 5)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 20 per person/ week (for the first 4 weeks)</p>

                                    <p>USD 25 per person /week ( beyond 4 weeks)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>11.</td>
                                <td><strong>Rasuwa (Province No. 3)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Gosaikunda Rural Municipality (All areas of ward no. 1 and some area of ward no.
                                            2)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 20 per person /week</p>
                                </td>
                            </tr>
                            <tr>
                                <td>12.</td>
                                <td><strong>Manang (Province No. 4)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Narpa Rural Municipality (All areas of ward no. 1 to 5)</li>
                                        <li>Nasho Rural Municipality (All areas of ward no. 6 and 7)</li>
                                    </ol>
                                </td>
                                <td><strong>September – November</strong>
                                    <p>USD 100 per person / week</p>

                                    <p>USD 15 per person / day (beyond 1 week)</p>
                                    <strong>December – August</strong>

                                    <p>USD 75 per person / week</p>

                                    <p>USD 15 per person / day (beyond 1 week)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>13.</td>
                                <td><strong>Bajhang (Province No. 7)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Saipal Rural Municipality (All areas of ward no. 1 to 5)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 90 per person / week for the first week</p>

                                    <p>USD 15 per person / day (beyond 1 week)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>14.</td>
                                <td><strong>Mugu (Province No. 6)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Mugumakarmarong Rural Municipality (All areas of ward no. 1 to 9)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 100 per person / week</p>

                                    <p>USD 15 per person / day (beyond 1 week)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>15.</td>
                                <td><strong>Darchula (Province No. 7)</strong>
                                    <ol style="list-style-type:lower-alpha">
                                        <li>Vyas Rural Municipality (All areas of ward no. 1)</li>
                                    </ol>
                                </td>
                                <td>
                                    <p>USD 90 per person / week</p>

                                    <p>USD 15 per person / day (beyond 1 week)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color:#4da42f; text-align:left" class="text-white">
                                    <p>Note:&nbsp;</p>

                                    <ol>
                                        <li>To get trekking permit an application form with other relevant documents should
                                            be submitted through any registered trekking agency of Nepal.</li>
                                        <li>Trekking permit fee must be paid in US Dollar: Not with standing anything
                                            written in above.</li>
                                    </ol>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                 
                </div>
            </div>
        </div>

    </section>

@endsection
@section('scripts')
@endsection