Imports System.Data.OleDb

Public Class Login

    Inherits System.Web.UI.Page

    Dim con As New OleDbConnection("Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\parth\sem5\asp\User.mdb")
    Dim cmd As New OleDbCommand
    Dim ad As New OleDbDataAdapter
    Dim ds As New DataSet


    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load

    End Sub

    Protected Sub Login1_Authenticate(sender As Object, e As System.Web.UI.WebControls.AuthenticateEventArgs) Handles Login1.Authenticate

        con.Open()
        cmd.CommandText = "Select * from login where Email='" & Login1.UserName & "' and Password='" & Login1.Password & "'"
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        ad.Fill(ds, "login")
        If ds.Tables("login").Rows.Count > 0 Then
            MsgBox("yes")
            Response.Redirect("home.aspx")

        Else
            MsgBox("no")
            Response.Redirect("reg.aspx")
            con.Close()

        End If


    End Sub
End Class