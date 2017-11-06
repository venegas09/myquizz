<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html><body>
		<h1>XML galderak</h1>
		<table border="1">
			<tr bgcolor="skyblue">
				<th>Galdera</th>
				<th>Zailtasuna</th>
				<th>Arloa</th>
				<th>Zuzena</th>
				<th>Okerrak</th>
			</tr>
		<xsl:for-each select="assessmentItems/assessmentItem">
			<tr>
				<td><xsl:value-of select="itemBody/p"/></td>
				<td><xsl:value-of select="@complexity"/></td>
				<td><xsl:value-of select="@subject"/></td>
				<td><xsl:value-of select="correctResponse/value"/></td>
				<td>
					<xsl:for-each select="incorrectResponses/value">
						<xsl:value-of select="."/><br/>
					</xsl:for-each>
				</td>
			</tr>
		</xsl:for-each>
		</table>
	</body>
</html>
</xsl:template>
</xsl:stylesheet>