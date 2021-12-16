<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
.trek-name-section {
    background-color: red;
}
</style>

<body>

    <!-- <div> -->
    <div class="container" style="background-color:  #ffb3b3;">
        <!-- <form style="display: flex;
  flex-wrap: wrap;"> -->
        <div class="trek-name-section">
            <div class="row col-md-12 form-group">
                <div class="col-md-12 form-group" style="text-align: center;">
                    <h2>Trek name</h2>
                </div>
            </div>
            <div class="row col-md-12 form-group">
                <!-- <hr> -->
                <div class="col-md-6">
                    <label for="select-trek" class="form-label">Trek name</label>
                    <select id="select-trek" class="form-control" placeholder="Pick a trek..." required="required">
                        <option selected="selected" value="">Select Trek</option>
                        <option value="22">Everest Base Camp Trek</option>
                        <option value="28">Nun Peak Expedition</option>
                        <option value="10">Chopta Chandrashila Trek</option>
                        <option value="24">Pangarchulla Peak Trek</option>
                        <option value="15">Chadar Frozen River Trek</option>
                        <option value="14">Brahmatal Trek</option>
                        <option value="5">Winter Kuari pass Trek</option>
                        <option value="23">Kedar Kantha Trek</option>
                        <option value="21">Auli Snow Skiing</option>
                        <option value="30">Gaumukh Tapovan Trek</option>
                        <option value="3">Goechala Trek</option>
                        <option value="1">Roopkund Trek</option>
                        <option value="2">Rupin Pass Trek</option>
                        <option value="16">Dayara Bugyal Trek</option>
                        <option value="4">Har Ki Doon Trek</option>
                        <option value="8">Bagini Glacier And Changbang Base Camp Trek</option>
                        <option value="29">Yunam Peak</option>
                        <option value="27">Kanamo Peak</option>
                        <option value="6">Stok Kangri Peak Expedition</option>
                        <option value="13">Pin Parvati Pass Trek</option>
                        <option value="7">Hampta Pass Trek</option>
                        <option value="25">Bhrigu Lake Trek</option>
                        <option value="9">Valley Of Flower Trek</option>
                        <option value="12">Kashmir Great Lakes Trek</option>
                        <option value="11">Tarsar Marsar Lake Trek</option>
                        <option value="17">Nag Tibba Trek</option>
                        <option value="18">Binsar Trek</option>
                        <option value="26">Nainital Corbett MTB</option>
                        <option value="20">Panchachuli Base Camp Trek</option>
                        <option value="31">Sandakphu Trek</option>
                        <option value="32">Shumga Trek</option>
                        <option value="33">Markha Valley Trek</option>
                        <option value="34">Kang Yatse II (Peak)</option>
                        <option value="35">Annapurna Base Camp Trek</option>
                        <option value="36">Buran Ghati</option>
                        <option value="37">Pindari Glacier Trek</option>
                        <option value="38">Kareri Lake Trek</option>
                        <option value="39">Manali To Leh (Khardungla) Cycling Expedition</option>
                        <option value="40">Deoban Trek</option>
                        <option value="41">Kedar Tal Trek</option>
                        <option value="42">Bali Pass Trek</option>
                        <option value="43">Pin Bhaba Pass Trek</option>
                        <option value="44">Auden&#39;s Col Expedition</option>
                        <option value="45">Rudugaira Peak Expedition</option>
                        <option value="46">Deo Tibba Expedition</option>
                        <option value="47">Dzo Jongo Peak</option>
                        <option value="48">Panchkedar Trek</option>
                        <option value="49">Char Dham Yatra</option>
                        <option value="50">Char Dham Yatra by Helicopter</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="select-date" class="form-label">Date</label>
                    <select id="select-date" class="form-control" placeholder="Pick a date..." required="required">
                        <option value="">Select Trek Date</option>
                        <option value="4259">14-Mar to 18-Mar-2021 (Closing, 10 Seat Left)</option>
                        <option value="4256">20-Mar to 24-Mar-2021 (Closing, 12 Seat Left)</option>
                        <option value="4729">26-Mar to 30-Mar-2021 (Open)</option>
                        <option value="4257">27-Mar to 31-Mar-2021 (Full)</option>
                        <option value="4261">28-Mar to 01-Apr-2021 (Full)</option>
                        <option value="4690">02-Apr to 06-Apr-2021 (Open)</option>
                        <option value="4730">03-Apr to 07-Apr-2021 (Open)</option>
                        <option value="4263">04-Apr to 08-Apr-2021 (Open)</option>
                        <option value="4727">05-Apr to 09-Apr-2021 (Open)</option>
                        <option value="4264">10-Apr to 14-Apr-2021 (Open)</option>
                        <option value="4265">11-Apr to 15-Apr-2021 (Open)</option>
                        <option value="4266">17-Apr to 21-Apr-2021 (Open)</option>
                        <option value="4267">18-Apr to 22-Apr-2021 (Open)</option>
                        <option value="4268">24-Apr to 28-Apr-2021 (Open)</option>
                        <option value="4269">25-Apr to 29-Apr-2021 (Open)</option>
                        <option value="4270">01-May to 05-May-2021 (Open)</option>
                        <option value="4271">02-May to 06-May-2021 (Open)</option>
                        <option value="4272">08-May to 12-May-2021 (Open)</option>
                        <option value="4273">09-May to 13-May-2021 (Open)</option>
                        <option value="4274">15-May to 19-May-2021 (Open)</option>
                        <option value="4275">16-May to 20-May-2021 (Open)</option>
                        <option value="4276">22-May to 26-May-2021 (Open)</option>
                        <option value="4277">23-May to 27-May-2021 (Open)</option>
                        <option value="4278">29-May to 02-Jun-2021 (Open)</option>
                        <option value="4279">30-May to 03-Jun-2021 (Open)</option>
                        <option value="4280">05-Jun to 09-Jun-2021 (Open)</option>
                        <option value="4281">12-Jun to 16-Jun-2021 (Open)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="trek-personal-section">
            <div class="row col-md-12 form-group" style="padding: 30px;">
                <div class="col-md-12" style="text-align: center;">
                    <h3>Personal details.</h3>
                </div>
                <!-- <hr> -->
            </div>

            <div class="row col-md-12 form-group">
                <div class="col-md-3"> <label for="firstname" class="form-label">First name</label> <input type="text"
                        class="form-control" id="firstname" required="required"></div>
                <div class="col-md-3"> <label for="lastname" class="form-label">Last name</label> <input type="text"
                        class="form-control" id="lastname" required="required"></div>
                <div class="col-md-3"> <label for="Phone" class="form-label">Contact number</label> <input type="number"
                        class="form-control" id="Phone" required="required"></div>
                <div class="col-md-3"> <label for="mail" class="form-label">Email</label> <input type="email"
                        class="form-control" id="mail" required="required"></div>
            </div>
            <br>
            <div class="row col-md-12 form-group">
                <div class="col-md-3">
                    <label for="select-gender" class="form-label">Gender</label>
                    <select id="select-gender" class="form-control" placeholder="Pick a Gender..." required="required">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Unspecified">Unspecified</option>
                    </select>
                </div>
                <div class="col-md-3"> <label for="emergency" class="form-label">Emergency contact number</label> <input
                        type="number" class="form-control" id="emergency" required="required"></div>
                <div class="col-md-6">
                    <label for="dob" class="form-label">Date of birth</label>
                    <div class="row" id="dob">
                        <div class="col-md-4">
                            <select id="select-date1" class="form-control" placeholder="Date" required="required">
                                <option value="">Date</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="Unspecified">Unspecified</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="select-month" class="form-control" placeholder="Month" required="required">
                                <option value="">Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="select-year" class="form-control" placeholder="Year" required="required">
                                <option value="">Year</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row col-md-12 form-group">
                <div class="col-md-4">
                    <label for="select-Weight" class="form-label">Weight</label>
                    <select id="select-Weight" class="form-control" placeholder="Weight" required="required">
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                        <option value="71">71</option>
                        <option value="72">72</option>
                        <option value="73">73</option>
                        <option value="74">74</option>
                        <option value="75">75</option>
                        <option value="76">76</option>
                        <option value="77">77</option>
                        <option value="78">78</option>
                        <option value="79">79</option>
                        <option value="80">80</option>
                        <option value="81">81</option>
                        <option value="82">82</option>
                        <option value="83">83</option>
                        <option value="84">84</option>
                        <option value="85">85</option>
                        <option value="86">86</option>
                        <option value="87">87</option>
                        <option value="88">88</option>
                        <option value="89">89</option>
                        <option value="90">90</option>
                        <option value="91">91</option>
                        <option value="92">92</option>
                        <option value="93">93</option>
                        <option value="94">94</option>
                        <option value="95">95</option>
                        <option value="96">96</option>
                        <option value="97">97</option>
                        <option value="98">98</option>
                        <option value="99">99</option>
                        <option value="100">100</option>
                        <option value="101">101</option>
                        <option value="102">102</option>
                        <option value="103">103</option>
                        <option value="104">104</option>
                        <option value="105">105</option>
                        <option value="106">106</option>
                        <option value="107">107</option>
                        <option value="108">108</option>
                        <option value="109">109</option>
                        <option value="110">110</option>
                        <option value="111">111</option>
                        <option value="112">112</option>
                        <option value="113">113</option>
                        <option value="114">114</option>
                        <option value="115">115</option>
                        <option value="116">116</option>
                        <option value="117">117</option>
                        <option value="118">118</option>
                        <option value="119">119</option>
                        <option value="120">120</option>
                        <option value="121">121</option>
                        <option value="122">122</option>
                        <option value="123">123</option>
                        <option value="124">124</option>
                        <option value="125">125</option>
                        <option value="126">126</option>
                        <option value="127">127</option>
                        <option value="128">128</option>
                        <option value="129">129</option>
                        <option value="130">130</option>
                        <option value="131">131</option>
                        <option value="132">132</option>
                        <option value="133">133</option>
                        <option value="134">134</option>
                        <option value="135">135</option>
                        <option value="136">136</option>
                        <option value="137">137</option>
                        <option value="138">138</option>
                        <option value="139">139</option>
                        <option value="140">140</option>
                        <option value="141">141</option>
                        <option value="142">142</option>
                        <option value="143">143</option>
                        <option value="144">144</option>
                        <option value="145">145</option>
                        <option value="146">146</option>
                        <option value="147">147</option>
                        <option value="148">148</option>
                        <option value="149">149</option>
                        <option value="150">150</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="select-Height" class="form-label">Height</label>
                    <select id="select-Height" class="form-control" placeholder="Height" required="required">
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                        <option value="71">71</option>
                        <option value="72">72</option>
                        <option value="73">73</option>
                        <option value="74">74</option>
                        <option value="75">75</option>
                        <option value="76">76</option>
                        <option value="77">77</option>
                        <option value="78">78</option>
                        <option value="79">79</option>
                        <option value="80">80</option>
                        <option value="81">81</option>
                        <option value="82">82</option>
                        <option value="83">83</option>
                        <option value="84">84</option>
                        <option value="85">85</option>
                        <option value="86">86</option>
                        <option value="87">87</option>
                        <option value="88">88</option>
                        <option value="89">89</option>
                        <option value="90">90</option>
                        <option value="91">91</option>
                        <option value="92">92</option>
                        <option value="93">93</option>
                        <option value="94">94</option>
                        <option value="95">95</option>
                        <option value="96">96</option>
                        <option value="97">97</option>
                        <option value="98">98</option>
                        <option value="99">99</option>
                        <option value="100">100</option>
                        <option value="101">101</option>
                        <option value="102">102</option>
                        <option value="103">103</option>
                        <option value="104">104</option>
                        <option value="105">105</option>
                        <option value="106">106</option>
                        <option value="107">107</option>
                        <option value="108">108</option>
                        <option value="109">109</option>
                        <option value="110">110</option>
                        <option value="111">111</option>
                        <option value="112">112</option>
                        <option value="113">113</option>
                        <option value="114">114</option>
                        <option value="115">115</option>
                        <option value="116">116</option>
                        <option value="117">117</option>
                        <option value="118">118</option>
                        <option value="119">119</option>
                        <option value="120">120</option>
                        <option value="121">121</option>
                        <option value="122">122</option>
                        <option value="123">123</option>
                        <option value="124">124</option>
                        <option value="125">125</option>
                        <option value="126">126</option>
                        <option value="127">127</option>
                        <option value="128">128</option>
                        <option value="129">129</option>
                        <option value="130">130</option>
                        <option value="131">131</option>
                        <option value="132">132</option>
                        <option value="133">133</option>
                        <option value="134">134</option>
                        <option value="135">135</option>
                        <option value="136">136</option>
                        <option value="137">137</option>
                        <option value="138">138</option>
                        <option value="139">139</option>
                        <option value="140">140</option>
                        <option value="141">141</option>
                        <option value="142">142</option>
                        <option value="143">143</option>
                        <option value="144">144</option>
                        <option value="145">145</option>
                        <option value="146">146</option>
                        <option value="147">147</option>
                        <option value="148">148</option>
                        <option value="149">149</option>
                        <option value="150">150</option>
                        <option value="151">151</option>
                        <option value="152">152</option>
                        <option value="153">153</option>
                        <option value="154">154</option>
                        <option value="155">155</option>
                        <option value="156">156</option>
                        <option value="157">157</option>
                        <option value="158">158</option>
                        <option value="159">159</option>
                        <option value="160">160</option>
                        <option value="161">161</option>
                        <option value="162">162</option>
                        <option value="163">163</option>
                        <option value="164">164</option>
                        <option value="165">165</option>
                        <option value="166">166</option>
                        <option value="167">167</option>
                        <option value="168">168</option>
                        <option value="169">169</option>
                        <option value="170">170</option>
                        <option value="171">171</option>
                        <option value="172">172</option>
                        <option value="173">173</option>
                        <option value="174">174</option>
                        <option value="175">175</option>
                        <option value="176">176</option>
                        <option value="177">177</option>
                        <option value="178">178</option>
                        <option value="179">179</option>
                        <option value="180">180</option>
                        <option value="181">181</option>
                        <option value="182">182</option>
                        <option value="183">183</option>
                        <option value="184">184</option>
                        <option value="185">185</option>
                        <option value="186">186</option>
                        <option value="187">187</option>
                        <option value="188">188</option>
                        <option value="189">189</option>
                        <option value="190">190</option>
                        <option value="191">191</option>
                        <option value="192">192</option>
                        <option value="193">193</option>
                        <option value="194">194</option>
                        <option value="195">195</option>
                        <option value="196">196</option>
                        <option value="197">197</option>
                        <option value="198">198</option>
                        <option value="199">199</option>
                        <option value="200">200</option>
                        <option value="201">201</option>
                        <option value="202">202</option>
                        <option value="203">203</option>
                        <option value="204">204</option>
                        <option value="205">205</option>
                    </select>
                </div>
            </div>
            <br>
        </div>
        <div class="trek-address-section">
            <div class="row col-md-12 form-group">
                <h3 style="text-align: center;">Address Details</h3>
            </div>
            <!-- <hr> -->
            <br>
            <div class="row col-md-12 form-group">
                <div class="col-md-4">
                    <label for="select-country" class="form-label">Country</label>
                    <select id="select-country" class="form-control" placeholder="Country" required="required">
                        <option value="">Select Country</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Bolivarian Republic of Venezuela"> Bolivarian Republic of Venezuela</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Caribbean">Caribbean</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Congo [DRC]">Congo [DRC]</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hong Kong SAR">Hong Kong SAR</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Ivory Coast">Ivory Coast</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Korea">Korea</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao PDR">Lao PDR</option>
                        <option value="Latin America">Latin America</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao SAR">Macao SAR</option>
                        <option value="Macedonia (Former Yugoslav Republic of Macedonia)"> Macedonia (Former Yugoslav
                            Republic of Macedonia)</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Panama">Panama</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Principality of Monaco">Principality of Monaco</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Réunion">R&#233;union</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Serbia and Montenegro (Former)">Serbia and Montenegro (Former)</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="U.A.E.">U.A.E.</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
                <div class="col-md-4"> <label for="State" class="form-label">State</label> <input type="text"
                        class="form-control" id="State" required="required"></div>
                <div class="col-md-4"> <label for="City" class="form-label">City</label> <input type="text"
                        class="form-control" id="City" required="required"></div>
            </div>
            <br>
        </div>
        <div class="trek-trekkers-section">
            <div class="row col-md-12 form-group">
                <h3 style="text-align: center;">Trekkers List</h3>
            </div>
            <!-- <hr> -->
            <br>
            <div class="row col-md-12 form-group">
                <div class="col-md-12 boxpadding">
                    <div class="imgbox margin_top">
                        <div class="boxmargintop clearfix exped_bg">
                            <div style="padding: 10px;">

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="drpNoOfTrekker" class="form-control" id="drpNoOfTrekker"
                                                required="required" data-live-search="true"
                                                onchange="createNodes(this.value);"
                                                class="form-control input-sm selectpicker show-tick">
                                                <option value="">Select Number Of Trekkers</option>
                                                <option value="Me Only">Me Only</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div><span class="margin_top"></span><span id="data"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="trek-other-section">
            <div class="row col-md-12 form-group">
                <h3 style="text-align: center;">Other details</h3>
            </div>
            <!-- <hr> -->
            <br>
            <div class="row col-md-12 form-group">
                <div class="col-md-6">
                    <label for="select-how" class="form-label">How did you find us?</label>
                    <select id="select-how" class="form-control" placeholder="Select (Not Mandatory)">
                        <option value="">Select (Not Mandatory)</option>
                        <option value="Search Engine">Search Engine</option>
                        <option value="Friend">Friend</option>
                        <option value="Fourms">Fourms</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Travel Magazines">Travel Magazines</option>
                        <option value="Through TTH Email">Through TTH Email</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="select-before" class="form-label">Have you trekked with us?</label>
                    <select id="select-before" class="form-control" placeholder="Select (Not Mandatory)">
                        <option value="">Select (Not Mandatory)</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
            <br>
            <!-- <hr> -->
            <div class="row col-md-12 form-group">
                <div class="column col-md-6">
                    <!-- <div class="col-md-4"> <b>Terms and Condition</b></div> -->
                    <div class="col-md-6 checkbox"> <input type="checkbox" required="required" name="terms" id="terms"
                            value="terms" /> <label for="terms">I agree all </label> <a
                            style="cursor: pointer !important;" onclick="">Terms and Condition</a></div>
                    <div class="col-md-6 checkbox"> <input type="checkbox" name="insurance" id="insurance"
                            value="insurance" /> <label for="insurance">I opt for Insurance</label></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"> <label class="control-label" for="txtnote">Note</label><textarea
                            name="txtnote" rows="2" cols="20" id="txtnote" class="form-control"> </textarea></div>
                </div>
            </div>
            <br>
        </div>
        <div class="trek-submit-section">
            <div class="row col-md-12 form-group">
                <div style="text-align: center;"> <button class="btn btn-primary">Submit</button></div>
            </div>
        </div>
        <!-- </form> -->
        <!-- </div> -->
    </div>

</body>