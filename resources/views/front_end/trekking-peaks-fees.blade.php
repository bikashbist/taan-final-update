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
                        <h1 class="text-white">Trekking Peaks fees</h1>
    
    
                    </div>
                    <img class="page-title-icon" src="{{asset('assets/site/images/layout-img/icon-page-title.png')}}" alt="icon">
                </div>
            </div>
            <div class="container pt-lg-5 pt-4">
                <div class="row">
                    <div class="col-sm-12">
                       
                        <h2><span style="color:#008080"><strong>Royalty for Nepali climber (per person in Nepali
                                    Rupees)</strong></span></h2>
    
                        <h2><span style="color:#008080"><strong>Group 'A' Peaks</strong></span></h2>
    
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td rowspan="3"><strong>S.N</strong></td>
                                    <td rowspan="3"><strong>Name of the peak</strong></td>
                                    <td rowspan="3"><strong>Region</strong></td>
                                    <td rowspan="3"><strong>Height</strong></td>
                                    <td colspan="4"><strong>Permit Fee (In Nepali Rupees)</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Spring&nbsp;</strong></td>
                                    <td><strong>Autumn&nbsp;</strong></td>
                                    <td><strong>Winter</strong></td>
                                    <td><strong>Summer</strong>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>(March-April-May)</td>
                                    <td>(Sept-Oct-Nov)</td>
                                    <td>(Dec-Jan-Feb)</td>
                                    <td>(June-July-Aug)</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Cholatse</td>
                                    <td>Khumbu</td>
                                    <td>6423m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kyazo Ri</td>
                                    <td>Mahalangur</td>
                                    <td>6151m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Phari Lapcha</td>
                                    <td>Mahalangur</td>
                                    <td>6159m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nirekha</td>
                                    <td>Mahalangur</td>
                                    <td>6169m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Langsisa Ri</td>
                                    <td>Jugal</td>
                                    <td>6412m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Obmigaichen</td>
                                    <td>Mahalangur</td>
                                    <td>6340m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Bokta</td>
                                    <td>Kanchenjunga</td>
                                    <td>6114m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Chekigo</td>
                                    <td>Gaurishankar</td>
                                    <td>6121m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Lobuje West</td>
                                    <td>Khumbu</td>
                                    <td>6135m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Larkya Peak</td>
                                    <td>Manaslu</td>
                                    <td>6416m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>ABI</td>
                                    <td>Mahalangur</td>
                                    <td>6043m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Yubra Himal</td>
                                    <td>Langtang Himal</td>
                                    <td>6048m</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                            </tbody>
                        </table>
    
                        <p>&nbsp;</p>
    
                        <h2><span style="color:#008080"><strong>Group 'B' Peaks</strong></span></h2>
    
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td rowspan="3"><strong>S.N</strong></td>
                                    <td rowspan="3"><strong>Name of the peak</strong></td>
                                    <td rowspan="3"><strong>Region</strong></td>
                                    <td rowspan="3"><strong>Height (In Meters)</strong></td>
                                    <td colspan="4"><strong>Permit Fee (In Nepali Rupees)</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Spring&nbsp;</strong></td>
                                    <td><strong>Autumn&nbsp;</strong></td>
                                    <td><strong>Winter</strong></td>
                                    <td><strong>Summer&nbsp;</strong></td>
                                </tr>
                                <tr>
                                    <td>(March-April-May)</td>
                                    <td>(Sept-Oct-Nov)</td>
                                    <td>(Dec-Jan-Feb)</td>
                                    <td>(June-July-Aug)</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Hiunchuli</td>
                                    <td>Annapurna Himal</td>
                                    <td>6423</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Singhu Chuli (Fluted Peak)</td>
                                    <td>Annapurna Himal</td>
                                    <td>6501</td>
                                    <td>5000</td>
                                    <td>2500</td>
                                    <td>1,250</td>
                                    <td>1,250</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Mera Peak</td>
                                    <td>Khumbu Himal</td>
                                    <td>6470</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Kusum Kangru</td>
                                    <td>Khumbu Himal</td>
                                    <td>6360</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Kwangde</td>
                                    <td>Khumbu Himal</td>
                                    <td>6011</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Chulu West</td>
                                    <td>Manang</td>
                                    <td>6419</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Chulu East</td>
                                    <td>Manang</td>
                                    <td>6584</td>
                                    <td>5000</td>
                                    <td>2500</td>
                                    <td>1,250</td>
                                    <td>1,250</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Imja Tse(Island Peak)</td>
                                    <td>Khumbu Himal</td>
                                    <td>6160</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Pharchamo</td>
                                    <td>Rolwaling Himal</td>
                                    <td>6187</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Lobuje</td>
                                    <td>Khumbu Himal</td>
                                    <td>6119</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Ramdung</td>
                                    <td>Rolwaling Himal</td>
                                    <td>5925</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Pisang Peak</td>
                                    <td>Manang</td>
                                    <td>6091</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Khongma Tse</td>
                                    <td>Khumbu Himal</td>
                                    <td>5849</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Ganja-la Chuli</td>
                                    <td>Langtang Himal</td>
                                    <td>5844</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Paldor Peak</td>
                                    <td>Langtang Himal</td>
                                    <td>5896</td>
                                    <td>4000</td>
                                    <td>2000</td>
                                    <td>1,000</td>
                                    <td>1,000</td>
                                </tr>
                            </tbody>
                        </table>
    
                        <h2><span style="color:#008080"><strong>&nbsp;Royalty for Foreign climbers (per person in US
                                    dollar)</strong></span></h2>
    
                        <h2><span style="color:#008080"><strong>Group 'A' Peaks</strong></span></h2>
    
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td rowspan="3"><strong>S.N</strong></td>
                                    <td rowspan="3"><strong>Name of the peak</strong></td>
                                    <td rowspan="3"><strong>Region</strong></td>
                                    <td rowspan="3"><strong>Height</strong></td>
                                    <td colspan="4"><strong>Permit Fee (In US dollars)</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Spring&nbsp;</strong></td>
                                    <td><strong>Autumn&nbsp;</strong></td>
                                    <td><strong>Winter</strong></td>
                                    <td><strong>Summer&nbsp;</strong></td>
                                </tr>
                                <tr>
                                    <td>(March-April-May)</td>
                                    <td>(Sept-Oct-Nov)</td>
                                    <td>(Dec-Jan-Feb)</td>
                                    <td>(June-July-Aug)</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Cholatse</td>
                                    <td>Khumbu</td>
                                    <td>6423m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kyazo Ri</td>
                                    <td>Mahalangur</td>
                                    <td>6151m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Phari Lapcha</td>
                                    <td>Mahalangur</td>
                                    <td>6159m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nirekha</td>
                                    <td>Mahalangur</td>
                                    <td>6169m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Langsisa Ri</td>
                                    <td>Jugal</td>
                                    <td>6412m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Obmigaichen</td>
                                    <td>Mahalangur</td>
                                    <td>6340m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Bokta</td>
                                    <td>Kanchenjunga</td>
                                    <td>6114m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Chekigo</td>
                                    <td>Gaurishankar</td>
                                    <td>6121m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Lobuje West</td>
                                    <td>Khumbu</td>
                                    <td>6135m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Larkya Peak</td>
                                    <td>Manaslu</td>
                                    <td>6416m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>ABI</td>
                                    <td>Mahalangur</td>
                                    <td>6043m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Yubra Himal</td>
                                    <td>Langtang Himal</td>
                                    <td>6048m</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                            </tbody>
                        </table>
    
                        <h2><span style="color:#008080"><strong>Group 'B' Peaks</strong></span></h2>
    
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan="8">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td rowspan="3"><strong>S.N</strong></td>
                                    <td rowspan="3"><strong>Name of the peak</strong></td>
                                    <td rowspan="3"><strong>Region</strong></td>
                                    <td rowspan="3"><strong>Height (In Meters)</strong></td>
                                    <td colspan="4"><strong>Permit Fee (In Nepali Rupees)</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Spring&nbsp;</strong></td>
                                    <td><strong>Autumn&nbsp;</strong></td>
                                    <td><strong>Winter</strong></td>
                                    <td><strong>Summer&nbsp;</strong></td>
                                </tr>
                                <tr>
                                    <td>(March-April-May)</td>
                                    <td>(Sept-Oct-Nov)</td>
                                    <td>(Dec-Jan-Feb)</td>
                                    <td>(June-July-Aug)</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Hiunchuli</td>
                                    <td>Annapurna Himal</td>
                                    <td>6423</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Singhu Chuli (Fluted Peak)</td>
                                    <td>Annapurna Himal</td>
                                    <td>6501</td>
                                    <td>400</td>
                                    <td>200</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Mera Peak</td>
                                    <td>Khumbu Himal</td>
                                    <td>6470</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Kusum Kangru</td>
                                    <td>Khumbu Himal</td>
                                    <td>6360</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Kwangde</td>
                                    <td>Khumbu Himal</td>
                                    <td>6011</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Chulu West</td>
                                    <td>Manang</td>
                                    <td>6419</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Chulu East</td>
                                    <td>Manang</td>
                                    <td>6584</td>
                                    <td>400</td>
                                    <td>200</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Imja Tse(Island Peak)</td>
                                    <td>Khumbu Himal</td>
                                    <td>6160</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Pharchamo</td>
                                    <td>Rolwaling Himal</td>
                                    <td>6187</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Lobuje</td>
                                    <td>Khumbu Himal</td>
                                    <td>6119</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Ramdung</td>
                                    <td>Rolwaling Himal</td>
                                    <td>5925</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Pisang Peak</td>
                                    <td>Manang</td>
                                    <td>6091</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Khongma Tse</td>
                                    <td>Khumbu Himal</td>
                                    <td>5849</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Ganja-la Chuli</td>
                                    <td>Langtang Himal</td>
                                    <td>5844</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Paldor Peak</td>
                                    <td>Langtang Himal</td>
                                    <td>5896</td>
                                    <td>250</td>
                                    <td>125</td>
                                    <td>70</td>
                                    <td>70</td>
                                </tr>
                            </tbody>
                        </table>
    
                        <p>&nbsp;</p>
    
                        <p>As per the decision of secretary-level dated 2014/4/29, the insurance amount for sardar, mountain
                            guide and high altitude worker fund is fixed at Rs 15 lakhs. Similarly, medical insurance has been
                            fixed at Rs 4 lakhs. Mountain heli-rescue of 10,000 USD is also required.&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp; &nbsp;<br>
                            Note: Maximum number of members in a team is 15.&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>
                            Garbage deposit to acquire climbing permit will be same i.e. USD 250. The refund shall be made as
                            per the provisions of NMA.&nbsp;</p>
    
                        <h2><span style="color:#008080"><strong>Climbers will not have to pay any permit fee for following NMA
                                    peaks</strong></span></h2>
    
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>S.N</strong></td>
                                    <td><strong>Name of the Peak</strong></td>
                                    <td><strong>Height</strong></td>
                                    <td><strong>Region</strong></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Tharpu Chuli (Tent Peak)</td>
                                    <td>5695m</td>
                                    <td>Annapurna Himal</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mardi Himal</td>
                                    <td>5553m</td>
                                    <td>Annapurna Himal</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Yala Peak</td>
                                    <td>5732m</td>
                                    <td>Langtang Himal</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Chhukung Ri</td>
                                    <td>5833m</td>
                                    <td>Mahalangur</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Machhermo</td>
                                    <td>5559m</td>
                                    <td>Mahalangur</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Pokhalde</td>
                                    <td>5780m</td>
                                    <td>Khumbu Himal</td>
                                </tr>
                            </tbody>
                        </table>
    
                        <p>&nbsp; &nbsp;&nbsp;</p>
    
                    </div>
                </div>
            </div>
    
        </section>

@endsection
@section('scripts')
@endsection