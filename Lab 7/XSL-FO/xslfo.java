import java.io.File;
import java.io.IOException;
import java.io.OutputStream;

import javax.xml.transform.Result;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.sax.SAXResult;
import javax.xml.transform.stream.StreamSource;

import org.apache.fop.apps.FOPException;
import org.apache.fop.apps.FOUserAgent;
import org.apache.fop.apps.Fop;
import org.apache.fop.apps.FopFactory;
import org.apache.fop.apps.MimeConstants;

public class xslfo {

    public static void main(String args[]) {

        
        File xmlfile = new File(baseDir, xml);
        File xsltfile = new File(baseDir, xsl);
        File pdffile = new File(outDir, "ResultXMLPDF.pdf");

        FopFactory fopFactory = FopFactory.newInstance();
        FOUserAgent foUserAgent = fopFactory.newFOUserAgent();

        OutputStream out = new java.io.FileOutputStream(pdffile);
        out = new java.io.BufferedOutputStream(out);

        try
        {
            Fop fop = fopFactory.newFop(MimeConstants.MIME_PDF, foUserAgent, out);
            // Setup XSLT
            TransformerFactory factory = TransformerFactory.newInstance();
            Transformer transformer = factory.newTransformer(new StreamSource(xsltfile));

            transformer.setParameter("versionParam", "1.0");

            Source src = new StreamSource(xmlfile);

            Result res = new SAXResult(fop.getDefaultHandler());

            transformer.transform(src, res);

        } finally {
            out.close();
        }

        System.out.println("Success!");

    }
}