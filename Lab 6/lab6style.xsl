<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version = "2.0" xmlns:xsl = "https://www.w3.org/1999/XSL/Transform">
<xsl:template match = "/">
<html>
<body>
<table border = "1">
  <tr>
    <th>Name</th>
    <th>Value</th>
    <th>Description</th>
  </tr>
  <xsl:for-each select="chess_pieces/piece">
    <tr>
      <td>
        <xsl:value-of select="name"/>
      </td>
      <td>
        <xsl:value-of select="value"/>
      </td>
      <td>
        <xsl:value-of select="description"/>
      </td>
    </tr>
  </xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>