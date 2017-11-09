<div id='marble' v-if="material.name == 'Marble'">
    <div class="table-responsive">
        <table class="col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1 col-xs-12 col-sm-12 table-condensed">
            <tr>
                <th>APPLICATIONS</th>
                <th>COMMERICAL</th>
                <th>LIGHT COMMERICAL</th>
                <th>RESIDENTIAL</th>
                <th>LIGHT RESIDENTIAL</th>
            </tr>
            <tr>
                <th>Wall</th>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
            </tr>
            <tr>
                <th>Flooring</th>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
            </tr>
            <tr>
                <th>Pool Lining</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Pool Decking</th>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
            </tr>
        </table>
    </div>
</div>
<div id='opus' v-else-if="material.name == 'Opus'">
    <div class="table-responsive">
        <table class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-sm-12 table-condensed">
            <tr>
                <th>APPLICATIONS</th>
                <th>COMMERICAL</th>
                <th>LIGHT COMMERICAL</th>
                <th>RESIDENTIAL</th>
                <th>LIGHT RESIDENTIAL</th>
            </tr>
            <tr>
                <th>Wall</th>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
            </tr>
            <tr>
                <th>Flooring</th>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
            </tr>
            <tr>
                <th>Pool Lining</th>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
            </tr>
            <tr>
                <th>Pool Decking</th>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
                <td>&#10003;</td>
            </tr>
        </table>
    </div>
</div>


<div  id='Vertex' v-else-if="material.name == 'Vertex'">
        <div class="table-responsive">
            <table class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-sm-12 table-condensed">
                <tr>
                    <th>APPLICATIONS</th>
                    <th>COMMERICAL</th>
                    <th>LIGHT COMMERICAL</th>
                    <th>RESIDENTIAL</th>
                    <th>LIGHT RESIDENTIAL</th>
                </tr>
                <tr>
                    <th>Wall</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Flooring</th>
                    <td></td>
                    <td></td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Lining</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Decking</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
            </table>
        </div>
</div>
<div  id='motherofpearl' v-else-if="material.name == 'Mother of Pearl'">
        <div class="table-responsive">
            <table class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-sm-12 table-condensed">
                <th>APPLICATIONS</th>
                <th>COMMERICAL</th>
                <th>LIGHT COMMERICAL</th>
                <th>RESIDENTIAL</th>
                <th>LIGHT RESIDENTIAL</th>
                </tr>
                <tr>
                    <th>Wall</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Flooring</th>
                    <td></td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Lining</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Decking</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
            </table>
        </div>
</div>

<div  id='murano'
     v-else-if="material.name == 'Murano Bloom' || material.name =='Murano Iris' || material.name == 'Murano Opaline'">

        <div class="table-responsive">
            <table class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-sm-12 table-condensed">
                <th>APPLICATIONS</th>
                <th>COMMERICAL</th>
                <th>LIGHT COMMERICAL</th>
                <th>RESIDENTIAL</th>
                <th>LIGHT RESIDENTIAL</th>
                </tr>
                <tr>
                    <th>Wall</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Flooring</th>
                    <td></td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Lining</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Decking</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
            </table>
        </div>
    </div>
<div id='tiffany' v-else-if="material.name == 'Tiffany'">

        <div class="table-responsive">
            <table class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-sm-12 table-condensed">
                <th>APPLICATIONS</th>
                <th>COMMERICAL</th>
                <th>LIGHT COMMERICAL</th>
                <th>RESIDENTIAL</th>
                <th>LIGHT RESIDENTIAL</th>
                </tr>
                <tr>
                    <th>Wall</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Flooring</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Lining</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Pool Decking</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
<div id='gold-platinum' v-else-if="material.name == 'Gold & Platinum'">

        <div class="table-responsive">
            <table class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-sm-12 table-condensed">
                <th>APPLICATIONS</th>
                <th>COMMERICAL</th>
                <th>LIGHT COMMERICAL</th>
                <th>RESIDENTIAL</th>
                <th>LIGHT RESIDENTIAL</th>
                </tr>
                <tr>
                    <th>Wall</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Flooring</th>
                    <td></td>
                    <td></td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Lining</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
                <tr>
                    <th>Pool Decking</th>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                    <td>&#10003;</td>
                </tr>
            </table>
        </div>
    </div>

